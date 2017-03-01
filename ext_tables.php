<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
$TCA["tx_wfqbe_credentials"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials',		
		'label' => 'title',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_credentials.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "title, type, host, dbms, username, passw, conn_type, setdbinit, connection_uri, connection_localconf",
	)
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_wfqbe_query");


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords("tx_wfqbe_query");

$TCA["tx_wfqbe_query"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query',		
		'label' => 'title',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',
		"default_sortby" => "ORDER BY title", 	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",	
			"fe_group" => "fe_group",
		),
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, fe_group, type, title, description, query, search, insertq, credentials, dbname, searchinquery",
	)
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_wfqbe_query");


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_wfqbe_backend");

$TCA["tx_wfqbe_backend"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend',		
		'label' => 'title',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		"default_sortby" => "ORDER BY sorting", 	
		"delete" => "deleted",
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dividers2tabs" => true,
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden,title,description,listq,detailsq,searchq,insertq,typoscript,recordsforpage",
	)
);


$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:wfqbe/flexform_ds.xml');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(Array('LLL:EXT:wfqbe/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY,"pi1/static/","DB Integration");


if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_wfqbe_pi1_wizicon"] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'pi1/static/class.tx_wfqbe_pi1_wizicon.php';


if (TYPO3_MODE == 'BE')    {
	$M1 = array(
		'routeTarget' => 'tx_wfqbe_module1::main',
		'name' => 'user_txwfqbeM1',
		'access' => 'user,group',
		'labels' => array(
			'tabs_images' => array(
				'tab' => 'EXT:wfqbe/mod1/moduleicon.gif',
			),
			'll_ref' => 'LLL:EXT:wfqbe/mod1/locallang_mod.xml',
		),
	);
	$M2 = array(
		'routeTarget' => 'tx_wfqbe_module2::main',
		'name' => 'user_txwfqbeM2',
		'access' => 'user,group',
		'labels' => array(
			'tabs_images' => array(
				'tab' => 'EXT:wfqbe/mod2/moduleicon.gif',
			),
			'll_ref' => 'LLL:EXT:wfqbe/mod2/locallang_mod.xml',
		),
	);
	/*
	$search = array(
		'routeTarget' => 'tx_wfqbe_query_searchwiz::main',
		'name' => 'xMOD_tx_wfqbe_query_searchwiz',
	);
	*/

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'user',
		'txwfqbeM1',
		'',
		'',
		$M1
	);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
		'web',
		'txwfqbeM2',
		'',
		'',
		$M2
	);
}
