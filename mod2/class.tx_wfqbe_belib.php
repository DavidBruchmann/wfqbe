<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005-2012 Mauro Lorenzutti (Webformat srl) (mauro.lorenzutti@webformat.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
/**
 * BE module
 *
 * @author	Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 */


require_once (t3lib_extMgm::extPath('wfqbe').'pi1/class.tx_wfqbe_pi1.php');

class tx_wfqbe_belib	{
	
	var $title = 'DB Management';
	var $page_id = 0;
	var $mode = '';
	var $piVars = '';
	var $conf;
	var $beDoc = null;
	
	
	/**
	 * 
	 * Main function
	 * @param unknown_type $caller
	 */
	function getContent($caller)	{
		global $BE_USER,$LANG;
		
		$content = '';
		
		if (t3lib_div::_GP('id')=='' || t3lib_div::_GP('id')<0)	{
			$content = $LANG->getLL('not_allowed');
		}
		
		$this->beDoc = $caller->doc;
		
		$this->page_id = intval(t3lib_div::_GP('id'));
		$beVars = t3lib_div::_GP('tx_wfqbe_backend');
		$this->piVars = t3lib_div::_GP('tx_wfqbe_pi1');
		$query_id = intval($beVars['query']);
		$backend_id = intval($beVars['uid']);
		$this->mode = $beVars['mode'];
		
		$where = '';
		if (t3lib_div::testInt($backend_id) && $backend_id>0)	{
			$where .= ' AND uid='.$backend_id;
		}
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_wfqbe_backend', 'deleted=0 AND hidden=0 AND pid='.$this->page_id.$where, '', 'sorting ASC');
		if ($res!==false && $GLOBALS['TYPO3_DB']->sql_num_rows($res)>1)	{
			$content = $this->getAvailableBackend($res);
		}	elseif ($res!==false && $GLOBALS['TYPO3_DB']->sql_num_rows($res)==1)	{
			$content = $this->getBackendRecord($GLOBALS['TYPO3_DB']->sql_fetch_assoc($res), $query_id);
		}	elseif ($res!==false)	{
			$content = $LANG->getLL('not_available');
		}	else	{
			$content = 'An error has occured while retrieving database configuration. Please contact the system administrator and report this error.';
		}
		
		return $content;
	}
	
	
	/**
	 * 
	 * Return title
	 */
	function getTitle()	{
		return $this->title;
	}
	
	
	/**
	 * 
	 * List all available backend actions
	 * @param unknown_type $res
	 */
	function getAvailableBackend($res)	{
		global $LANG;
		$this->title = $LANG->getLL('please_select');
		$content = '<p>'.$LANG->getLL('please_select_more').'</p>';
		$content .= '<table class="typo3-dblist">';
		$content .= '<tr class="t3-row-header"><td class="col-title" colspan="2">'.$LANG->getLL('please_select').'</td></tr>';
		
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
			$content .= '
			<tr class="db_list_normal">
				<td class="col-title"><a href="index.php?&M=web_txwfqbeM2&id='.$this->page_id.'&tx_wfqbe_backend[uid]='.$row['uid'].'">'.$row['title'].'</a></td>
				<td>'.$row['description'].'</td>
			</tr>
			';
		}
		
		$content .= '</table>';
		return $content;
	}
	
	
	
	/**
	 * 
	 * Action selected, returns the records list
	 * @param unknown_type $res
	 */
	function getBackendRecord($backend, $query=0)	{
		global $LANG, $BACK_PATH;
		/*$content = t3lib_div::view_array($this->conf);
		return $content;
		*/
		// Initialize typoscript configuration
		$this->initConfig($backend['typoscript']);
		$sessionData = $GLOBALS['BE_USER']->getSessionData('tx_wfqbe_backend_sessiondata');
		
		$PI1 = t3lib_div::makeInstance('tx_wfqbe_pi1');
		$PI1->conf = $this->conf;
		$PI1->beMode = true;
		
		$this->title = $backend['title'];
		$content = '';
		
		if (($query>0 && $query==$backend['insertq']) || $this->piVars['wfqbe_editing_mode']==1 || $this->piVars['wfqbe_deleting_mode']==1)	{
			// EDIT MODE
			
			$PI1->conf['ff_data']['queryObject'] = $backend['insertq'];
			$form_built = false;
			$content .= $PI1->do_general('', $form_built, $this);
			if (is_array($sessionData) && $sessionData['backurl']!='')
				$content .= '<br /><p><a href="'.$sessionData['backurl'].'"><img height="16" width="16" src="'.$BACK_PATH.'sysext/t3skin/icons/module_web_list.gif" title="'.$LANG->getLL('back_to_list').'" alt="'.$LANG->getLL('back_to_list').'"> '.$LANG->getLL('back_to_list').'</a></p>';
			else
				$content .= '<br /><p><a href="index.php?&M=web_txwfqbeM2&id='.$this->page_id.'&tx_wfqbe_backend[uid]='.$backend['uid'].'"><img height="16" width="16" src="'.$BACK_PATH.'sysext/t3skin/icons/module_web_list.gif" title="'.$LANG->getLL('back_to_list').'" alt="'.$LANG->getLL('back_to_list').'"> '.$LANG->getLL('back_to_list').'</a></p>';
		}	elseif ($this->mode=='details')	{
			// DETAILS MODE
			
			if ($backend['detailsq']!='')	{
				$detailsq = explode(',', $backend['detailsq']);
				if (is_array($detailsq))	{
					foreach ($detailsq as $dquid)	{
						$PI1->conf['ff_data']['queryObject'] = $dquid;
						$form_built = false;
						$content .= $PI1->do_general('', $form_built, $this);
					}
				}
			}
			if (is_array($sessionData) && $sessionData['backurl']!='')
				$content .= '<br /><p><a href="'.$sessionData['backurl'].'"><img height="16" width="16" src="'.$BACK_PATH.'sysext/t3skin/icons/module_web_list.gif" title="'.$LANG->getLL('back_to_list').'" alt="'.$LANG->getLL('back_to_list').'"> '.$LANG->getLL('back_to_list').'</a></p>';
			else
				$content .= '<br /><p><a href="index.php?&M=web_txwfqbeM2&id='.$this->page_id.'&tx_wfqbe_backend[uid]='.$backend['uid'].'"><img height="16" width="16" src="'.$BACK_PATH.'sysext/t3skin/icons/module_web_list.gif" title="'.$LANG->getLL('back_to_list').'" alt="'.$LANG->getLL('back_to_list').'"> '.$LANG->getLL('back_to_list').'</a></p>';
		}	else	{
			// LIST MODE
			// Setting backtolist value
			$backurl = 'index.php?&M=web_txwfqbeM2&id='.t3lib_div::_GP('id');
			$wfqbeParams = t3lib_div::_GP('tx_wfqbe_pi1');
			if (is_array($wfqbeParams))	{
				foreach ($wfqbeParams as $key => $value)
					$backurl .= '&tx_wfqbe_pi1['.$key.']='.$value;
			}
			$sessionData['backurl'] = $backurl;
			$GLOBALS['BE_USER']->setAndSaveSessionData('tx_wfqbe_backend_sessiondata', $sessionData);
			
			$contentSearchQ = '';
			if ($backend['searchq']>0)	{
				$PI1->conf['ff_data']['queryObject'] = $backend['searchq'];
				$form_built = false;
				$contentSearchQ .= $PI1->do_general('do_sGetForm', $form_built, $this);
			}
			
			if ($contentSearchQ!='' && $backend['searchq_position']=='top')
				$content .= $contentSearchQ;
			
			if ($backend['listq']>0)	{
				$PI1->conf['ff_data']['queryObject'] = $backend['listq'];
				if ($backend['recordsforpage']>0)
					$PI1->conf['ff_data']['recordsForPage'] = $backend['recordsforpage'];
				$form_built = false;
				$content .= $PI1->do_general('', $form_built, $this);
			}
			
			if ($contentSearchQ!='' && ($backend['searchq_position']=='bottom' || $backend['searchq_position']==''))
				$content .= $contentSearchQ;
			
			if ($backend['insertq']>0)	{
				$content .= '<br /><p><a href="index.php?&M=web_txwfqbeM2&id='.$this->page_id.'&tx_wfqbe_backend[uid]='.$backend['uid'].'&tx_wfqbe_backend[query]='.$backend['insertq'].'"><span class="t3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-new">&nbsp;</span>'.$LANG->getLL('new_record').'</a></p>';
			}
		}
		
		return $content;
	}
	
	
	
	/**
	 * 
	 * Function used to initialize typoscript configuration, merging standard and specific backend typoscript
	 */
	function initConfig($typoscript='')	{
		$this->conf = $this->retrievePageConfig($this->page_id);
		if (is_array($this->conf['backend.']))	{
			$beConf = $this->conf['backend.'];
			unset($this->conf['backend.']);
			$this->conf = array_replace_recursive($this->conf, $beConf);
		}
		
		if ($typoscript!='')	{
			require_once(PATH_t3lib.'class.t3lib_tsparser.php');
			$tsparser = t3lib_div::makeInstance('t3lib_tsparser');
			// Copy conf into existing setup
			$tsparser->setup = $this->conf;
			// Parse the new Typoscript
			$tsparser->parse($typoscript);
			// Copy the resulting setup back into conf
			$this->conf = $tsparser->setup;
		}
	}
	
	
	
	
	/**
     * Retrieves the configuration (TS setup) of the page with the PID provided
     * as the parameter $pageId.
     */
    function retrievePageConfig($pageId) {
        global $BE_USER;
    	require_once(PATH_t3lib.'class.t3lib_page.php');
        
        if (!is_object($GLOBALS['TT']))	{
        	require_once(PATH_t3lib . 'class.t3lib_timetrack.php');
        	$GLOBALS['TT'] = new t3lib_timeTrack();
        }

        $GLOBALS['TSFE']->tmpl = t3lib_div::makeInstance('t3lib_TStemplate');
        // Disables the logging of time-performance information.
        $GLOBALS['TSFE']->tmpl->tt_track = 0;
        $GLOBALS['TSFE']->tmpl->init();
        $GLOBALS['TSFE']->tmpl->getFileName_backPath = PATH_site;

        // Gets the root line.
        $GLOBALS['TSFE']->sys_page = t3lib_div::makeInstance('t3lib_pageSelect');
        // Finds the selected page in the BE exactly as in t3lib_SCbase::init().
        $rootline = $GLOBALS['TSFE']->sys_page->getRootLine($pageId);
		
        // Disable sys_page to allow BE workspace_OL
        if (t3lib_div::int_from_ver(TYPO3_version)>4007000)
        	unset ($GLOBALS['TSFE']->sys_page);
        
          // Generates the constants/config and hierarchy info for the template.
        $GLOBALS['TSFE']->tmpl->runThroughTemplates($rootline, 0);
        $GLOBALS['TSFE']->tmpl->generateConfig();

        if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_wfqbe_pi1.'])) {
            $result = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_wfqbe_pi1.'];
        } else {
            $result = array();
        }
        
        // Re-create sys_page for Typoscript stdWrap calls
        $GLOBALS['TSFE']->sys_page = t3lib_div::makeInstance('t3lib_pageSelect');
        
        //t3lib_div::debug($result);
        return $result;
    }
    
    
	
}


?>