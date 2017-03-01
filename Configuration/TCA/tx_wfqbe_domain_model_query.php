<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',

		),
		'searchFields' => 'title,description,query,dbname,search,insertq,type,fe_group,credentials,searchinquery,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('wfqbe') . 'Resources/Public/Icons/tx_wfqbe_domain_model_query.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, query, dbname, search, insertq, type, fe_group, credentials, searchinquery',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description, query, dbname, search, insertq, type, fe_group, credentials, searchinquery, '),
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
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'foreign_table_where' => 'AND tx_wfqbe_domain_model_query.pid=###CURRENT_PID### AND tx_wfqbe_domain_model_query.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'query' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.query',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'dbname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.dbname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'search' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.search',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'insertq' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.insertq',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.type',
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
		'fe_group' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.fe_group',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'fe_groups',
				'MM' => 'tx_wfqbe_query_frontendusergroup_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'module' => array(
							'name' => 'wizard_edit',
						),
						'type' => 'popup',
						'title' => 'Edit',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'module' => array(
							'name' => 'wizard_add',
						),
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'fe_groups',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
					),
				),
			),
		),
		'credentials' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.credentials',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_wfqbe_domain_model_credential',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'searchinquery' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_query.searchinquery',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		
	),
);


/**
 * OLD: tx_wfqbe_query
 */
/*
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
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."Configuration/TCA/tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden, fe_group, type, title, description, query, search, insertq, credentials, dbname, searchinquery",
	)
);
// ----------
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
				'wizards' => array(
					'imagemap' => array(
						'type' => 'script', // popup
						"title" => "Select Wizard:",
						"notNewRecords" => 1,
						#'JSopenParams' => 'height=700,width=780,status=0,menubar=0,scrollbars=1',
						#'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/img/link_popup.gif',
						'module' => array(
							'name' => 'wizard_wfqbe_select',
							'urlParameters' => array(
								'mode' => 'wizard',
								'ajax' => '0'
							),
						),
					),
					'_VALIGN' => 'middle',
					'_PADDING' => '4',
				),
				
				#"wizards" => Array(
				#	"_PADDING" => 2,
				#	"example" => Array(
				#		"title" => "Select Wizard:",
				#		"type" => "script",
				#		"notNewRecords" => 1,
				#		"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_query/wizard_icon.gif",
				#		"module" => array(
				#			"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_query/index.php",
				#		),
				#	),
				#),
			)
		),
		"search" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.search",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
				'wizards' => array(
					'imagemap' => array(
						'type' => 'script', // popup
						"title" => "Search Wizard:",
						"notNewRecords" => 1,
						#'JSopenParams' => 'height=700,width=780,status=0,menubar=0,scrollbars=1',
						#'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/img/link_popup.gif',
						'module' => array(
							'name' => 'wizard_wfqbe_search',
							'urlParameters' => array(
								'mode' => 'wizard',
								'ajax' => '0'
							),
						),
					),
					'_VALIGN' => 'middle',
					'_PADDING' => '4',
				),
				
				#"wizards" => Array(
				#	"_PADDING" => 2,
				#	"example" => Array(
				#		"title" => "Search Wizard:",
				#		"type" => "script",
				#		"notNewRecords" => 1,
				#		"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_search/wizard_icon.gif",
				#		"module" => array(
				#			"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_search/index.php",
				#		),
				#	),
				#),
			)
		),
		"insertq" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:wfqbe/locallang_db.xml:tx_wfqbe_query.insertq",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
				'wizards' => array(
					'imagemap' => array(
						'type' => 'script', // popup
						"title" => "Insert Wizard:",
						"notNewRecords" => 1,
						#'JSopenParams' => 'height=700,width=780,status=0,menubar=0,scrollbars=1',
						#'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/img/link_popup.gif',
						'module' => array(
							'name' => 'wizard_wfqbe_insert',
							'urlParameters' => array(
								'mode' => 'wizard',
								'ajax' => '0'
							),
						),
					),
					'_VALIGN' => 'middle',
					'_PADDING' => '4',
				),
				
				#"wizards" => Array(
				#	"_PADDING" => 2,
				#	"example" => Array(
				#		"title" => "Insert Wizard:",
				#		"type" => "script",
				#		"notNewRecords" => 1,
				#		"icon" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_insert/wizard_icon.gif",
				#		"module" => array(
				#			"name" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("wfqbe")."tx_wfqbe_query_insert/index.php",
				#		),
				#	),
				#),
				
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
// ---------- */
