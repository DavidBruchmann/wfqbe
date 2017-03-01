<?php

namespace Barlian\Wfqbe\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2006 Davide Menegon <menedav@libero.it>
 *  (c) 2007 Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 *  (c) 2017 David Bruchmann <david.bruchmann@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\MathUtility;
use \TYPO3\CMS\Core\Messaging\AbstractMessage;
use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * QueryController
 */
class QueryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * queryRepository
     *
     * @var \Barlian\Wfqbe\Domain\Repository\QueryRepository
     * @inject
     */
    protected $queryRepository = NULL;

    /**
     * connectRepository
     *
     * @var \Barlian\Wfqbe\Domain\Repository\ConnectRepository
     * @inject
     */
	protected $connectRepository = NULL;


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $this->cObj = $this->configurationManager->getContentObject();
		$this->conf = $this->settings;
			// these vars will be assigned and used different:
		unset($this->conf['flexform']);
		$this->initFF();

		$queries = $this->queryRepository->findAll();
        $this->view->assign('queries', $queries);

		// @TODO: reeplace
		$this->piVars = $this->request->getArguments();

		// Hook that can be used to customize the extension configuration programmatically
		// @TODO: not yet tested after migration to extbase and TYPO3 7.x
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['wfqbe']['customizeConfiguration']))    {
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['wfqbe']['customizeConfiguration'] as $_classRef) {
				$_procObj = &\GeneralUtility::getUserObj($_classRef);
				$_params = array('conf' => $this->conf);
				$this->conf = $_procObj->customizeConfiguration($_params, $this);
			}
		}
		if ($this->conf['recordsForPage'] != '') {
			$this->conf['ff_data']['recordsForPage'] = $this->conf['recordsForPage'];
		}

		// Disable output if required parameter is not set
		if ($this->conf['ff_data']['parameterCheck']!='')	{
			$check = explode('|', $this->conf['ff_data']['parameterCheck']);
			if (is_array($check))	{
				$var = GeneralUtility::_GP($check[0]);
				if ($var=='') {
					return '';
				}
				if (count($check)>1) {
					for ($i=1; $i<count($check); $i++) {
						$var = $var[$check[$i]];
						if ($var=='')
							return '';
					}
				}
			}
		}

		// EN: check whether a CSS is defined. If yes, use it or I the default one will be taken
		// IT: controllo se � stato definito un css. Se si lo utilizzo altrimenti prendo quello di default
		// @TODO:
		// - css here is missing
		// - where is the checking logic?
		$js = $this->cObj->fileResource('EXT:wfqbe/Resources/Public/JS/functions.js');
		$GLOBALS["TSFE"]->setJS($this->extKey, $js);
		unset($css, $js);

#		$this->pi_setPiVarDefaults();
#		$this->pi_loadLL();
#		$this->pi_USER_INT_obj=1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!

		/**
		 * Instantiate the xajax object and configure it
		 * @TODO:
		 * - move the assignement of the XAJAX-extension to a method, perhaps an own class for usage in several places
		 *     XajaxController ??
		 * - currently usage of AJAX below is disabled, enable and fix all related classes and methods
		 */
		$xajaxLib = NULL;
		$xajaxLoaded = ExtensionManagementUtility::isLoaded('xajax');
		$taxajaxLoaded = ExtensionManagementUtility::isLoaded('taxajax');
		if(1==2 && $this->conf['enableXAJAX']==1 && ($xajaxLoaded || $taxajaxLoaded)) {
			$xajaxLib = $xajaxLoaded ? 'xajax' : 'tx_taxajax';

# DebuggerUtility::var_dump(array('$conf[\'enableXAJAX\']'=>$this->conf['enableXAJAX'],'$xajaxLib'=>$xajaxLib));

			// Make the instance
			$this->xajax = GeneralUtility::makeInstance($xajaxLib);
			// nothing to set, we send to the same URI
			# $this->xajax->setRequestURI('xxx');
			// Decode form vars from utf8 ???
			$this->xajax->decodeUTF8InputOn();
			// Encode of the response to utf-8 ???
			$this->xajax->setCharEncoding('utf-8');
			// To prevent conflicts, prepend the extension prefix
			$this->xajax->setWrapperPrefix($this->prefixId);
			// Do you wnat messages in the status bar?
			$this->xajax->statusMessagesOn();
			// Turn only on during testing
			//$this->xajax->debugOn();
			// Register the names of the PHP functions you want to be able to call through xajax
			// $xajax->registerFunction(array('functionNameInJavascript', &$object, 'methodName'));

			//$this->xajax->registerFunction(array('processFormData', &$this, 'processAjax'));
			$this->xajax->registerFunction(array('processResultsData', &$this, 'processResults'));
			$this->xajax->registerFunction(array('processSearchData', &$this, 'processSearch'));
			$this->xajax->registerFunction(array('processInsertData', &$this, 'processInsert'));
			//$this->xajax->registerFunction(array('processInsertUpdateForm', &$this, 'processInsert'));

			// If this is an xajax request, call our registered function, send output and exit
			$this->xajax->processRequests();
			// Else create javascript and add it to the header output
			$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId] = $this->xajax->getJavascript(ExtensionManagementUtility::siteRelPath('xajax'));
		} else {
			# DebuggerUtility::var_dump(array('ERROR'=>'XAJAX is not enabled.'));
		}
		
		// The form goes here
		$form_built = false;
		$content .= $this->sGetForm($form_built);

		// The result box goes here
		if (!GeneralUtility::_GP('tx_wfqbe_pi1') && $form_built) {
			// We make an empty result box on the first call to send our xajax responses to
			$content .= '<div id="wfqbe_results"></div>';
		} else {
			// This fallback will only be used if JavaScript doesn't work
			// Responses of xajax exit before this
			$content .= $this->sGetFormResult();
		} // if (!GeneralUtility::_GP('xajax'))
# DebuggerUtility::var_dump(array('$this->sGetFormResult()'=>$this->sGetFormResult(),'$content'=>$content));
		$content = $this->clearInput($content);
# DebuggerUtility::var_dump(array('$content'=>$content));

		// @TODO:
		// - WHAT is type 181? AJAX-page-type ?
		// - shouldn't the AJAX-page-type be configurable ?
		if (GeneralUtility::_GP('type')=='181') {
			return $content;
		} elseif ($this->conf['wrapInBaseClass']==1) {
			return $this->wrapInBaseClass($content);
		} else {
			return $content;
		}
    }
	
	public function wrapInBaseClass($content){
		return '<div class="'.$this->prefixId.'">'.$content.'</div>';
	}


	/**
	 * This function is used to initialize the FlexForm data from the plugin and to overwrite the TS configuration
	 * @TODO:
	 * - IMPORTANT: not all flexform-values are assigned in the moment, fix it!
	 * - Assignments are quite questionable and should be controlled by following usage in classes and methods
	 * - dots in arrays could be removed probably, but then not only in Assignments but also in using classes and methods
	 *     example: $this->conf['email.']
	 */
	function initFF()	{
		
		$lConf = array();
		
		// Assign the flexform data to a local variable for easier access
		$flexform = $this->settings['flexform'];

		if (!is_array($flexform) || !count($flexform)) {
			return;
		}
		
		// Traverse the entire array and assign each configuration option to $lConf
		// this is just flattening the incoming array by removing the sheets as keys
		foreach ($flexform as $sheet => $data) {
			foreach ( $data as $key => $value ) {
				$lConf[$key] = $value;
			}
		}
		# DebuggerUtility::var_dump(array( '$this->conf[\'ff_data\']' => $this->conf['ff_data'] ));
		
		if ($this->conf['ff_data']['templateFile']!='') {
			if (strpos($lConf['templateFile'], 'media:')!==false) {
				// @TODO:
				// - Can this whole block be removed ??
				//   if not: update variables and logic here, nothing done yet!
				// - Whats about update of old data ??
				$file = explode(':', $lConf['templateFile']);
				if (MathUtility::canBeInterpretedAsInteger($file[1])) {
					$resDam = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_dam', 'uid='.$file[1].$this->cObj->enableFields('tx_dam'));
					if ($resDam!==false && $GLOBALS['TYPO3_DB']->sql_num_rows($resDam)==1) {
						$rowDam = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resDam);
						$this->conf['template'] = $rowDam['file_path'].$rowDam['file_name'];
					}
				}
			} else {
				$this->conf['template'] = $this->conf['ff_data']['templateFile'];
			}
		}
		if ($lConf['debugQuery']!='') {
			$this->conf['debugQuery'] = $lConf['debugQuery'];
		}
		if ($lConf['customTemplate']!='') {
			$this->conf['defLayout'] = $lConf['customTemplate'];
		}
		if ($lConf['pageConfirmation']!='') {
			$this->conf['insert.']['pageConfirmation'] = $lConf['pageConfirmation'];
		}
		if ($lConf['div_id']=='') {
			$this->conf['ff_data']['div_id'] = 'wfqbe_id_notset';
		} else {
			$this->conf['ff_data']['div_id'] = $lConf['div_id'];
		}
		if ($lConf['notify_subject']!='') {
			$this->conf['email.']['notify_subject'] = $lConf['notify_subject'];
		}
		if ($lConf['ff_data']['notify_email']!='') {
			$this->conf['email.']['notify_email'] = $lConf['notify_email'];
		}
		if ($lConf['ff_data']['send_email']!='') {
			$this->conf['email.']['send_email'] = $lConf['send_email'];
		}
		if ($lConf['ff_data']['notify_subject_user']!='') {
			$this->conf['email.']['notify_subject_user'] = $lConf['notify_subject_user'];
		}
		if ($lConf['ff_data']['field_email_user']!='') {
			$this->conf['email.']['field_email_user'] = $lConf['field_email_user'];
		}
		if ($lConf['ff_data']['send_email_user']!='') {
			$this->conf['email.']['send_email_user'] = $lConf['send_email_user'];
		}
		if ($lConf['ff_data']['mailTemplate']!='') {
			$this->conf['email.']['template'] = $lConf['mailTemplate'];
		}
		if ($lConf['recordsForPage']!='') {
			$this->conf['ff_data']['recordsForPage'] = $lConf['recordsForPage'];
		}
		if ($lConf['parameterCheck']!='') {
			$this->conf['ff_data']['parameterCheck'] = $lConf['parameterCheck'];
		}
		if($lConf['queryObject'] != '') {
			$this->conf['ff_data']['queryObject'] = $lConf['queryObject'];
		}
	}


	/**
	 *
	 */
	function sGetForm(&$form_built) {
		return $this->do_general('do_sGetForm', $form_built);
	}


	/**
	 *
	 */
	function sGetFormResult() {
		$form_built = '';
		return $this->do_general('do_sGetFormResult', $form_built);
	}


	/**
	 *
	 */
	function do_general($to_function, &$form_built, $beObj = null) {
		$content='';
		// @TODO: replace $beObj
		if (!is_null($beObj)) {
			$this->beObj = $beObj;
		}
		if (!is_object($this->cObj)) {
			$this->cObj = GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
		}
		if ($this->piVars['wfqbe_add_new'] != '' && intval($this->piVars['wfqbe_add_new']) > 0) {

			$row = $this->queryRepository->getByUid( intval($this->conf['ff_data']['queryObject']) );

			$this->original_row = $row;
			$this->insertBlocks = $this->getInsertBlocks($row);
		
		} elseif (isset($this->piVars['wfqbe_add_new'])) {
			unset($this->piVars['wfqbe_add_new']);
		}
		if ($this->piVars['wfqbe_select_wizard']!='' && intval($this->piVars['wfqbe_select_wizard'])>=0) {
			
			$row = $this->queryRepository->getByUid( intval($this->conf['ff_data']['queryObject']) );

			$this->original_row = $row;
			$this->insertBlocks = $this->getInsertBlocks($row);
			if ($this->insertBlocks['fields'][$this->piVars['wfqbe_select_wizard']]['form']['multiple']==1) {
				$this->piVars['wfqbe_select_wizard_type'] = 'checkbox';
			} else {
				$this->piVars['wfqbe_select_wizard_type'] = 'radio';
			}
			
		} elseif (isset($this->piVars['wfqbe_select_wizard'])) {
			unset($this->piVars['wfqbe_select_wizard']);
		}
# $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;
		$row = '';
		$case = 0;
		$uidToGet = NULL;
		if (intval($this->piVars['wfqbe_results_query']) !== 0) {
			$uidOfRowToGet = intval($this->piVars['wfqbe_results_query']);
			$case = 1;
		} elseif ($this->piVars['wfqbe_add_new']!='') {
			$uidOfRowToGet = intval( $this->insertBlocks['fields'][ $this->piVars['wfqbe_add_new'] ]['form']['add_new']);
			$case = 2;
		} elseif (MathUtility::canBeInterpretedAsInteger($this->piVars['wfqbe_select_wizard'])) {
			$uidOfRowToGet = intval( $this->insertBlocks['fields'][ $this->piVars['wfqbe_select_wizard'] ]['form']['select_wizard'] );
			$case = 3;
		} else {
			$uidOfRowToGet = intval( $this->conf['ff_data']['queryObject'] );
			$case = 4;
		}
		$row = $this->queryRepository->findByUid( $uidOfRowToGet );

		// Create the connection to the remote DB
		$connection_obj = $this->connectRepository->connect( $row );

		if ($connection_obj!==false) {
			if ($to_function == 'do_sGetForm') {
				$content .= $this->do_sGetForm(
					$connection_obj["row"],
					$connection_obj["conn"],
					$form_built
				);
			} else {
				$content .= $this->do_sGetFormResult(
					$connection_obj["row"],
					$connection_obj["conn"]
				);
DebuggerUtility::var_dump(array(
	'__METHOD__' => __METHOD__,
	'__LINE__' => __LINE__,
	#'$this->insertBlocks' => $this->insertBlocks,
	'$row' => $row,
	#'$this->conf[ff_data]'=>$this->conf['ff_data'],
	'to_function' => $to_function,
	'$form_built' => $form_built,
	#'$case' => $case,
	#'uid' => $this->cObj->data['uid'],
	#'$this->piVars' => $this->piVars,
	#'$_GET'=>$_GET,
	#'$_POST'=>$_POST,
	#'$where' => $where,
	#'$this' => $this,
	'$this->cObj->data' => $this->cObj->data,
	'$connection_obj' => $connection_obj,
	#'$content'=>$content,
	#'$GLOBALS[TYPO3_DB]->debug_lastBuiltQuery'=>$GLOBALS['TYPO3_DB']->debug_lastBuiltQuery
));
			}
		} else {
			$content.='<div id="'.$this->conf['ff_data']['div_id'].'">';
			$content.= "Connection failed. Please check your credentials and the dbname.";
			$content.='</div>';
		}

/*
*/
		return $content;
	}


	/**
	 * Function used to unserialize the insertq field (the insert form data structure)
	 */
	function getInsertBlocks($row) {
		$blocks = "";
		if ($row->getInsertq() != '') {
			$blocks = \Barlian\Wfqbe\Utility\ArrayUtility::xml2array( $row->getInsertq() );
		}
		return $blocks;
	}


	/**
	 *
	 */
	function do_sGetForm($row, $h, &$form_built) {
		if ($row->getType() =='search')	{
			// SEARCH
			$SEARCH = GeneralUtility::makeInstance("tx_wfqbe_search");
			$SEARCH->main($this->conf, $this->cObj, $this);
			$content = $SEARCH->do_sGetForm($row, $h, $form_built);

		} elseif ($row->getType() =='insert') {
			// INSERT
		} else {
			return '';
		}
		return $content;
	}


	/**
	 *
	 */
	function do_sGetFormResult($row, $h) {
		if ($row->getType() === 'insert') {
			// INSERT
			$INSERT = GeneralUtility::makeInstance("tx_wfqbe_insert");
			$INSERT->main($this->conf, $this->cObj, $this);
			$content = $INSERT->do_sGetFormResult($row, $h);
			$case = 1;
		} elseif ($row->getType() === 'search') {
			// SEARCH
			$SEARCH = GeneralUtility::makeInstance("tx_wfqbe_search");
			$SEARCH->main($this->conf, $this->cObj, $this);
			$content = $SEARCH->do_sGetFormResult($row, $h);
			$case = 2;
		} else {
			// SELECT
			$SELECT = GeneralUtility::makeInstance("tx_wfqbe_results");
			$SELECT->main($this->conf, $this->cObj, $this);
			$content = $SELECT->do_sGetFormResult($row, $h, $this->request);
			$case = 3;
		}
DebuggerUtility::var_dump(array(
	'__METHOD__' => __METHOD__,
	'__LINE__' => __LINE__,
	'$row'=>$row,
	'$row->getType()' => $row->getType(),
	'$SEARCH'=>$SEARCH,
	'$content'=>explode("\n",$content),
	'$case' => $case,
));

		return $content;
	}



	/**
	 * html without hidden non-associated tags
	 */
	function clearInput($html) {
  		$html = preg_replace("/(###)+[a-z,A-Z,0-9,@,!,%_]+(###)/", "", $html);
  		return $html;
 	}


	/**
	 *
	 * SECTION: AJAX
	 *
	 */


	/**
	 * The registered XAJAX function for the results list
	 * @TODO: currently usage of AJAX is disabled in mainAction(), enable and fix all related classes and methods
	 */
	function processResults($data) {
		$this->piVars = $data[$this->prefixId];

		$content = $this->sGetFormResult();

		$objResponse = new tx_xajax_response();
		if ($this->conf['ff_data']['div_search_result_id']!="") {
			$objResponse->addAssign($this->conf['ff_data']['div_search_result_id'], 'innerHTML', $content);
		} else {
			$objResponse->addAssign($this->conf['ff_data']['div_id'], 'innerHTML', $content);
		}
		return $objResponse->getXML();
	}


	/**
	 * The registered XAJAX function for the search form update
	 * @TODO: currently usage of AJAX is disabled in mainAction(), enable and fix all related classes and methods
	 */
	function processSearch($data) {
		$this->piVars = $data[$this->prefixId];

		$SEARCH = GeneralUtility::makeInstance("tx_wfqbe_search");
		$SEARCH->main($this->conf, $this->cObj, $this);
		$content = $SEARCH->sGetSearchForm_Ajax();

		$objResponse = new tx_xajax_response();
		$objResponse->addAssign($this->piVars['wfqbe_destination_id'], 'innerHTML', $content);
		return $objResponse->getXML();
	}


	/**
	 * The registered XAJAX function for the insert data management
	 * @TODO: currently usage of AJAX is disabled in mainAction(), enable and fix all related classes and methods
	 */
	function processInsert($data) {
		$this->piVars = $data[$this->prefixId];

		$INSERT = GeneralUtility::makeInstance("tx_wfqbe_insert");
		$INSERT->main($this->conf, $this->cObj, $this);
		$content = $INSERT->sGetInsertForm_Ajax();

		$objResponse = new tx_xajax_response();

		$destination_id = $this->conf['ff_data']['div_id'];
		if ($this->piVars['wfqbe_destination_id']!="")
			$destination_id = $this->piVars['wfqbe_destination_id'];

		$objResponse->addAssign($destination_id, 'innerHTML', $content);
		return $objResponse->getXML();
	}

    /**
     * action show
     *
     * @param \Barlian\Wfqbe\Domain\Model\Query $query
     * @return void
     */
    public function showAction(\Barlian\Wfqbe\Domain\Model\Query $query)
    {
        $this->view->assign('query', $query);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Barlian\Wfqbe\Domain\Model\Query $newQuery
     * @return void
     */
    public function createAction(\Barlian\Wfqbe\Domain\Model\Query $newQuery)
    {
        $this->addFlashMessage('The object was created. <br>'.
			'Please be aware that this action is publicly accessible unless you implement an access check. <br>'.
			'See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR
		);
        $this->queryRepository->add($newQuery);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Barlian\Wfqbe\Domain\Model\Query $query
     * @ignorevalidation $query
     * @return void
     */
    public function editAction(\Barlian\Wfqbe\Domain\Model\Query $query)
    {
        $this->view->assign('query', $query);
    }

    /**
     * action update
     *
     * @param \Barlian\Wfqbe\Domain\Model\Query $query
     * @return void
     */
    public function updateAction(\Barlian\Wfqbe\Domain\Model\Query $query)
    {
        $this->addFlashMessage(
			'The object was updated. <br>'.
			'Please be aware that this action is publicly accessible unless you implement an access check. <br>'.
			'See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR
		);
        $this->queryRepository->update($query);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Barlian\Wfqbe\Domain\Model\Query $query
     * @return void
     */
    public function deleteAction(\Barlian\Wfqbe\Domain\Model\Query $query)
    {
        $this->addFlashMessage('The object was deleted. <br>'.
			'Please be aware that this action is publicly accessible unless you implement an access check. <br>'.
			'See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', AbstractMessage::ERROR
		);
        $this->queryRepository->remove($query);
        $this->redirect('list');
    }

}