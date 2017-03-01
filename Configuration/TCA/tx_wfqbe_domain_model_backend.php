<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend',
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
			'disabled' => 'hidden',

		),
		'searchFields' => 'title,description,recordsforpage,searchq_position,typoscript,export_mode,listq,detailsq,searchq,insertq,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('wfqbe') . 'Resources/Public/Icons/tx_wfqbe_domain_model_backend.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, recordsforpage, searchq_position, typoscript, export_mode, listq, detailsq, searchq, insertq',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description, recordsforpage, searchq_position, typoscript, export_mode, listq, detailsq, searchq, insertq, '),
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
				'foreign_table' => 'tx_wfqbe_domain_model_backend',
				'foreign_table_where' => 'AND tx_wfqbe_domain_model_backend.pid=###CURRENT_PID### AND tx_wfqbe_domain_model_backend.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.description',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'recordsforpage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.recordsforpage',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'searchq_position' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.searchq_position',
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
		'typoscript' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.typoscript',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'export_mode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.export_mode',
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
		'listq' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.listq',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'detailsq' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.detailsq',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'MM' => 'tx_wfqbe_backend_detailsq_query_mm',
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
							'table' => 'tx_wfqbe_domain_model_query',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
					),
				),
			),
		),
		'searchq' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.searchq',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'insertq' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:wfqbe/Resources/Private/Language/locallang_db.xlf:tx_wfqbe_domain_model_backend.insertq',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_wfqbe_domain_model_query',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);


/**
 * OLD: tx_wfqbe_backend
 */
/*
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_wfqbe_backend");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords("tx_wfqbe_backend");
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
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)."Configuration/TCA/tca.php",
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)."icon_tx_wfqbe_query.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "hidden,title,description,listq,detailsq,searchq,insertq,typoscript,recordsforpage",
	)
);
// ----------
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
// ---------- */
