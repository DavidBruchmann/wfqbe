<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(

		),
		'searchFields' => 'title,host,dbms,username,passw,conn_type,setdbinit,dbname,connection_mode,connection_uri,connection_localconf,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('wfqbe') . 'Resources/Public/Icons/tx_wfqbe_domain_model_credential.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, host, dbms, username, passw, conn_type, setdbinit, dbname, connection_mode, connection_uri, connection_localconf',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title, host, dbms, username, passw, conn_type, setdbinit, dbname, connection_mode, connection_uri, connection_localconf, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_wfqbe_domain_model_credential',
				'foreign_table_where' => 'AND tx_wfqbe_domain_model_credential.pid=###CURRENT_PID### AND tx_wfqbe_domain_model_credential.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'host' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.host',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'dbms' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.dbms',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'username' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.username',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'passw' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.passw',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'conn_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.conn_type',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'setdbinit' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.setdbinit',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'dbname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.dbname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'connection_mode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.connection_mode',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'connection_uri' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.connection_uri',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'connection_localconf' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_credential.connection_localconf',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);


/**
 * OLD: tx_wfqbe_credentials
 */
/*
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
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."Configuration/TCA/tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_credentials.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "title, type, host, dbms, username, passw, conn_type, setdbinit, connection_uri, connection_localconf",
	)
);
// ----------
$TCA["tx_wfqbe_credentials"] = Array (
	"ctrl" => $TCA["tx_wfqbe_credentials"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "title,host,dbms,username,passw,conn_type,setdbinit,dbname"
	),
	"feInterface" => $TCA["tx_wfqbe_credentials"]["feInterface"],
	"columns" => Array (
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		'type' => Array (
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.type",
			'config' => Array (
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => Array (
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.type.I.0', 'standard'),
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.type.I.1', 'uri'),
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.type.I.2', 'localconf'),
				),
			)
		),
		"host" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.host",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"dbms" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms",		
			"config" => Array (
				"type" => "select",
				"renderType" => "selectSingle",
				"items" => Array (
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.0", "mysql"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.1", "postgres"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.2", "mssql"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.3", "oci8"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.4", "access"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbms.I.5", "sybase"),
				),
				"size" => 1,	
				"maxitems" => 1,
			)
		),
		"username" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.username",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"passw" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.passw",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "password",
			)
		),
		"conn_type" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.conn_type",		
			"config" => Array (
				"type" => "select",
				"renderType" => "selectSingle",
				"items" => Array (
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.conn_type.I.0", "Connetc"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.conn_type.I.1", "PConnect"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.conn_type.I.2", "NConnect"),
				),
				"size" => 1,	
				"maxitems" => 1,
			)
		),
		"setdbinit" => Array (
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.setdbinit",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"dbname" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.dbname",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "",
			)
		),
		"connection_uri" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.connection_uri",		
			"config" => Array (
				"type" => "input",	
				"size" => "80",
			)
		),
		"connection_localconf" => Array (
				"exclude" => 1,
				"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_credentials.connection_localconf",
				"config" => Array (
						"type" => "select",
						"renderType" => "selectSingle",
						"items" => array(array('','')),
						"size" => 1,
						"maxitems" => 1,
						"itemsProcFunc" => "tx_wfqbe_tca_credentials_connection_localconf_preprocessing->main",
				)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "title;;;;2-2-2, type, host;;;;3-3-3, dbms, username, passw, dbname, conn_type, setdbinit"),
		"standard" => Array("showitem" => "title;;;;2-2-2, type, host;;;;3-3-3, dbms, username, passw, dbname, conn_type, setdbinit"),
		"uri" => Array("showitem" => "title;;;;2-2-2, type, connection_uri, setdbinit"),
		"localconf" => Array("showitem" => "title;;;;2-2-2, type, connection_localconf, setdbinit"),
	),
	"palettes" => Array (
		"1" => Array("showitem" => "")
	)
);
// ---------- */
