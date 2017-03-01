<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009  <>
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


    // DEFAULT initialization of a module [BEGIN]

$LANG->includeLLFile('EXT:wfqbe/mod2/locallang.xml');
$GLOBALS['BE_USER']->modAccess($GLOBALS['TBE_MODULES']['_configuration']['txwfqbeM2'],1);    // This checks permissions and exits if the users has no permission for entry.
    // DEFAULT initialization of a module [END]


/**
 * Module 'DB management' for the 'wfqbe' extension.
 *
 * @author     <>
 * @package    TYPO3
 * @subpackage    tx_wfqbe
 */
class  tx_wfqbe_module2 extends t3lib_SCbase {
                var $pageinfo;

                /**
                 * Initializes the Module
                 * @return    void
                 */
                function init()    {
                    global $LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

                    parent::init();

                }

                /**
                 * Adds items to the ->MOD_MENU array. Used for the function menu selector.
                 *
                 * @return    void
                 */
                function menuConfig()    {
                    global $LANG;
                    $this->MOD_MENU = Array (
                        'function' => Array (
                            '1' => $LANG->getLL('function1'),
                            '2' => $LANG->getLL('function2'),
                            '3' => $LANG->getLL('function3'),
                        )
                    );
                    parent::menuConfig();
                }

                /**
                 * Main function of the module. Write the content to $this->content
                 * If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
                 *
                 * @return    [type]        ...
                 */
                function main()    {
                    global $LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

                    // Access check!
                    // The page will show only if there is a valid page and if this page may be viewed by the user
                    $this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
                    $access = is_array($this->pageinfo) ? 1 : 0;

                    if (($this->id && $access) || ($GLOBALS['BE_USER']->user['admin'] && !$this->id))    {

                            // Draw the header.
                        $this->doc = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('bigDoc');
                        $this->doc->backPath = $BACK_PATH;
                        $this->doc->form='<form action="" id="_form" method="post" enctype="multipart/form-data">';

                        global $BACK_PATH;
                        
                        //$pageRenderer = $this->pibase->beObj->beDoc->getPageRenderer();
                        $pageRenderer = $this->doc->getPageRenderer();
                        $pageRenderer->loadExtJS();
                        $pageRenderer->addJsFile($BACK_PATH . '../t3lib/js/extjs/tceforms.js', 'text/javascript', false);
                        $pageRenderer->addJsFile($BACK_PATH . '../t3lib/js/extjs/ux/Ext.ux.DateTimePicker.js', 'text/javascript', false);
                        
                        $modTSconfig = $GLOBALS['BE_USER']->getTSConfig(
                        		'mod.tx_wfqbe_mod2',
                        		t3lib_BEfunc::getPagesTSconfig($this->id)
                        );
                        
                        if ($modTSconfig['properties']['customCSS']!='')	{
                        	$pageRenderer->addCssFile($BACK_PATH . '../'.$modTSconfig['properties']['customCSS']);
                        }
                        
                        $typo3Settings = array(
                        		'datePickerUSmode' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['USdateFormat'] ? 1 : 0,
                        		'dateFormat'       => array('j-n-Y', 'G:i j-n-Y'),
                        		'dateFormatUS'     => array('n-j-Y', 'G:i n-j-Y'),
                        );
                        //$pageRenderer->addInlineSettingArray('', $typo3Settings);

                        //$headerSection = $this->doc->getHeader('pages',$this->pageinfo,$this->pageinfo['_thePath']).'<br />'.$LANG->sL('LLL:EXT:lang/locallang_core.xml:labels.path').': '.\TYPO3\CMS\Core\Utility\GeneralUtility::fixed_lgd_cs($this->pageinfo['_thePath'],50);

                        $this->content.=$this->doc->startPage($LANG->getLL('title'));
                        //$this->content.=$this->doc->header($LANG->getLL('title'));
                        $this->content.=$this->doc->spacer(5);
                        //$this->content.=$this->doc->section('',$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,'SET[function]',$this->MOD_SETTINGS['function'],$this->MOD_MENU['function'])));
                        $this->content.=$this->doc->divider(5);


                        // Render content:
                        $this->moduleContent();


                        // ShortCut
                        if ($GLOBALS['BE_USER']->mayMakeShortcut())    {
                            $this->content.=$this->doc->spacer(20).$this->doc->section('',$this->doc->makeShortcutIcon('id',implode(',',array_keys($this->MOD_MENU)),$this->MCONF['name']));
                        }

                        $this->content.=$this->doc->spacer(10);
                    } else {
                            // If no access or if ID == zero

                        $this->doc = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('mediumDoc');
                        $this->doc->backPath = $BACK_PATH;

                        $this->content.=$this->doc->startPage($LANG->getLL('title'));
                        $this->content.=$this->doc->header($LANG->getLL('title'));
                        $this->content.=$this->doc->spacer(5);
                        $this->content.=$this->doc->spacer(10);
                    }
                }

                /**
                 * Prints out the module HTML
                 *
                 * @return    void
                 */
                function printContent()    {

                    $this->content.=$this->doc->endPage();
                    echo $this->content;
                }

                /**
                 * Generates the module content
                 *
                 * @return    void
                 */
                function moduleContent()    {
                    $BELIB = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_wfqbe_belib');
                    $content = $BELIB->getContent($this);
                    $title = $BELIB->getTitle();
					$this->content.=$this->doc->section($title,$content,0,1);
                }
            }



// Make instance:
$SOBE = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_wfqbe_module2');
$SOBE->init();

$SOBE->main();
$SOBE->printContent();
