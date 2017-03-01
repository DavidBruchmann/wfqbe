<?php

defined('TYPO3_MODE') OR die('Access denied.');

/*
 * ICONS
 */
$icons = array(
	'add' => 'add.gif',
	'ce_wiz' => 'ce_wiz.gif',
	'clear' => 'clear.gif',
	'closedok' => 'closedok.gif',
	'delete' => 'delete.gif',
	'edit' => 'edit.gif',
	'mod1_icon' => 'mod1_icon.gif',
	'mod2_icon' => 'mod2_icon.gif',
	'open' => 'open.gif',
	'refresh' => 'refresh_n.gif',
	'saveandclosedok' => 'saveandclosedok.gif',
	'savedok' => 'savedok.gif',
	'insert_wizard_icon' => 'tx_wfqbe_query_insert_wizard_icon.gif',
	'query_wizard_icon' => 'tx_wfqbe_query_query_wizard_icon.gif',
	'select_wizard_icon' => 'tx_wfqbe_query_query_wizard_icon.gif',
	'search_wizard_icon' => 'tx_wfqbe_query_search_wizard_icon.gif',
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( \TYPO3\CMS\Core\Imaging\IconRegistry::class );
foreach($icons as $name => $file){
	$iconRegistry->registerIcon(
	   'tx-wfqbe-'.$name, // Icon-Identifier, z.B. tx-myext-action-preview
	   \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class, 		// SvgIconProvider // FontawesomeIconProvider
	   array('source' => 'EXT:'.$_EXTKEY.'/Resources/Public/Icons/'.$file)
	);
}

$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
#require_once($extPath.'Classes/Controller/WfqbePi1Controller.php');
require_once($extPath.'Classes/Controller/WfqbeModule1Controller.php');
require_once($extPath.'Classes/Controller/WfqbeModule2Controller.php');
require_once($extPath.'Classes/Domain/Repository/ConnectRepository.php');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocNew.tx_wfqbe_credentials=1
	options.saveDocNew.tx_wfqbe_query=1
');

  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
	$_EXTKEY,
	'editorcfg','
	tt_content.CSS_editor.ch.tx_wfqbe_pi1 = < plugin.tx_wfqbe_pi1.CSS_editor
', 'defaultContentRendering'
);

/*
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43(
	$_EXTKEY,
	'Classes/Controller/class.tx_wfqbe_pi1.php', //'pi1/class.Tx_Wfqbe_Pi1.php',
	'_pi1',
	'list_type',
	0
);

$TYPO3_CONF_VARS['BE']['AJAX']['tx_wfqbe_mod1_ajax::fieldTypeHelp'] = 
	'typo3conf/ext/wfqbe/Ajax/mod1/class.tx_wfqbe_mod1_ajax.php:tx_wfqbe_mod1_ajax->ajaxFieldTypeHelp';

*/

/*
 * PLUGIN
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Barlian.' . $_EXTKEY,
	'Pi1',
	array(
		# 'WfqbePi1' => 'main',
		'Query' => 'list, show, new, create, edit, update, delete',
		'Credential' => 'list, show, new, create, edit, update, delete',
		'Backend' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		# 'WfqbePi1' => '',
		'Credential' => 'create, update, delete',
		'Query' => 'create, update, delete',
		'Backend' => 'create, update, delete',
		
	)
);
