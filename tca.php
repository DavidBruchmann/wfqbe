<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

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



$TCA["tx_wfqbe_query"] = Array (
	"ctrl" => $TCA["tx_wfqbe_query"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,fe_group,type,title,description,query,search,insertq,credentials,dbname,searchinquery"
	),
	"feInterface" => $TCA["tx_wfqbe_query"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.xml:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.xml:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"renderType" => "selectSingle",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.xml:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.xml:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		'type' => Array (
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.type",
			'config' => Array (
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => Array (
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.type.I.0', 'select'),
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.type.I.1', 'insert'),
					Array('LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.type.I.2', 'search'),
				),
				'default' => 'select',
				'authMode' => $GLOBALS['TYPO3_CONF_VARS']['BE']['explicitADmode'],
				'authMode_enforce' => 'strict',
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"description" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"query" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.query",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",	
				"wizards" => Array(
					"_PADDING" => 2,
					"example" => Array(
						"title" => "Select Wizard:",
						"type" => "script",
						"notNewRecords" => 1,
						"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_query/wizard_icon.gif",
						"module" => array(
							"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_query/index.php",
						),
					),
				),
			)
		),
		"search" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.search",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",	
				"wizards" => Array(
					"_PADDING" => 2,
					"example" => Array(
						"title" => "Search Wizard:",
						"type" => "script",
						"notNewRecords" => 1,
						"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_search/wizard_icon.gif",
						"module" => array(
							"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_search/index.php",
						),
					),
				),
			)
		),
		"insertq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.insertq",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",	
				"wizards" => Array(
					"_PADDING" => 2,
					"example" => Array(
						"title" => "Insert Wizard:",
						"type" => "script",
						"notNewRecords" => 1,
						"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_insert/wizard_icon.gif",
						"module" => array(
							"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_insert/index.php",
						),
					),
				),
			)
		),
		"credentials" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.credentials",		
			"config" => Array (
				"type" => "select",	
				"renderType" => "selectSingle",
				"items" => Array (
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.credentials.I.0", "#TYPO3DB#"),
				),
				"foreign_table" => "tx_wfqbe_credentials",	
				"foreign_table_where" => "ORDER BY tx_wfqbe_credentials.uid",	
				"size" => 1,
				"minitems" => 0,
				"maxitems" => 1,	
			)
		),
		"dbname" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.dbname",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"searchinquery" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.searchinquery",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_wfqbe_query",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, type, title;;;;2-2-2, description;;;;3-3-3, credentials, dbname, query"),
		"select" => Array("showitem" => "hidden;;1;;1-1-1, type, title;;;;2-2-2, description;;;;3-3-3, credentials, dbname, query"),
		"insert" => Array("showitem" => "hidden;;1;;1-1-1, type, title;;;;2-2-2, description;;;;3-3-3, credentials, dbname, insertq"),
		"search" => Array("showitem" => "hidden;;1;;1-1-1, type, title;;;;2-2-2, description;;;;3-3-3, credentials, dbname, searchinquery, search"),
	),
	"palettes" => Array (
		"1" => Array("showitem" => "fe_group"),
	)
);




$TCA["tx_wfqbe_backend"] = Array (
	"ctrl" => $TCA["tx_wfqbe_backend"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,title,description,listq,detailsq,searchq,insertq,typoscript,recordsforpage"
	),
	"feInterface" => $TCA["tx_wfqbe_backend"]["feInterface"],
	"columns" => Array (
		"hidden" => Array (		
			"exclude" => 1,
			"label" => "LLL:EXT:lang/locallang_general.xml:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"description" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"listq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.listq",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_wfqbe_query",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"detailsq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.detailsq",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_wfqbe_query",	
				"size" => 5,	
				"minitems" => 0,
				"maxitems" => 100,
			)
		),
		"searchq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.searchq",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_wfqbe_query",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"insertq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.insertq",		
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_wfqbe_query",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"typoscript" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.typoscript",		
			"config" => Array (
				"type" => "text",
				"cols" => "80",	
				"rows" => "20",	
			)
		),
		"recordsforpage" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.recordsforpage",		
			"config" => Array (
				"type" => "input",	
				"size" => "5",
				"eval" => "int",
			)
		),
		"searchq_position" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.searchq_position",
			"config" => Array (
				"type" => "select",
				"renderType" => "selectSingle",
				"items" => Array (
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.searchq_position.I.0", "bottom"),
					Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.searchq_position.I.1", "top"),
				),
				"size" => 1,
				"maxitems" => 1,
			)
		),
		"export_mode" => Array (
				"exclude" => 1,
				"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.export_mode",
				"config" => Array (
					"type" => "select",
					"renderType" => "selectSingle",
					"items" => Array (
						Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.export_mode.I.0", ""),
						Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.export_mode.I.1", "csv"),
						Array("LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_backend.export_mode.I.2", "xls"),
					),
					"size" => 1,
					"maxitems" => 1,
				)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => "hidden;;1;;1-1-1, title,description,--div--;Listing,listq, recordsforpage, export_mode,--div--;Details,detailsq,--div--;Search,searchq,searchq_position,--div--;Insert,insertq,--div--;Config,typoscript"),
	),
	"palettes" => Array (
	)
);
?>
