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
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_wfqbe_credentials.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "title, type, host, dbms, username, passw, conn_type, setdbinit, connection_uri, connection_localconf",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_wfqbe_query");


t3lib_extMgm::addToInsertRecords("tx_wfqbe_query");

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
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, fe_group, type, title, description, query, search, insertq, credentials, dbname, searchinquery",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_wfqbe_query");


t3lib_extMgm::allowTableOnStandardPages("tx_wfqbe_backend");

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
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden,title,description,listq,detailsq,searchq,insertq,typoscript,recordsforpage",
	)
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:wfqbe/flexform_ds.xml');


t3lib_extMgm::addPlugin(Array('LLL:EXT:wfqbe/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');


t3lib_extMgm::addStaticFile($_EXTKEY,"pi1/static/","DB Integration");


if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_wfqbe_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/static/class.tx_wfqbe_pi1_wizicon.php';


if (TYPO3_MODE == 'BE')    {
    t3lib_extMgm::addModule('user','txwfqbeM1','',t3lib_extMgm::extPath($_EXTKEY).'mod1/');        
    t3lib_extMgm::addModule('web','txwfqbeM2','',t3lib_extMgm::extPath($_EXTKEY).'mod2/');
}


?>