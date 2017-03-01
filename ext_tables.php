<?php

defined('TYPO3_MODE') OR die('Access denied.');

/**
 * PLUGIN
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Barlian.' . $_EXTKEY,
	'Pi1',
	'DB Integration'
);

/**
 * FLEXFORM
 */
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist']    [$_EXTKEY.'_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$_EXTKEY.'_pi1',
	'FILE:EXT:wfqbe/Configuration/FlexForm/flexform_pi1_ds.xml'
);

if (TYPO3_MODE === 'BE') {
	
#	$wizardPath = $extPath.'Classes/Wizard/';
#	require_once($wizardPath.'WfqbeInsertWizard.php');
#	require_once($wizardPath.'WfqbeSearchWizard.php');
#	require_once($wizardPath.'WfqbeSelectWizard.php');

	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_wfqbe_pi1_wizicon"] = 
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Classes/Wizicon/class.tx_wfqbe_pi1_wizicon.php';


	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Barlian.' . $_EXTKEY,
		'user',  // Make module a submodule of 'user'
		'mod1',  // Submodule key
		'',      // Position
		array(
			'WfqbeModule1' => 'main',
			'Credential' => 'list, show, new, create, edit, update, delete',
			'Query' => 'list, show, new, create, edit, update, delete',
			'Backend' => 'list, show, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod1.xlf',
		)
	);

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Barlian.' . $_EXTKEY,
		'web',   // Make module a submodule of 'web'
		'mod2',  // Submodule key
		'',      // Position
		array(
			'WfqbeModule2' => 'main',
			'Credential' => 'list, show, new, create, edit, update, delete',
			'Query' => 'list, show, new, create, edit, update, delete',
			'Backend' => 'list, show, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod2.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript',
	'DB Integration'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wfqbe_domain_model_backend');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wfqbe_domain_model_credential');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wfqbe_domain_model_query');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_wfqbe_domain_model_backend',
	'EXT:wfqbe/Resources/Private/Language/locallang_csh_tx_wfqbe_domain_model_backend.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_wfqbe_domain_model_credential',
	'EXT:wfqbe/Resources/Private/Language/locallang_csh_tx_wfqbe_domain_model_credential.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_wfqbe_domain_model_query',
	'EXT:wfqbe/Resources/Private/Language/locallang_csh_tx_wfqbe_domain_model_query.xlf'
);
