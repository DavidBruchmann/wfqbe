<?php

# use TYPO3\CMS\Backend\Controller;

/**
 * Definitions for routes provided by EXT:backend
 * Contains all "regular" routes for entry points
 *
 * Please note that this setup is preliminary until all core use-cases are set up here.
 * Especially some more properties regarding modules will be added until TYPO3 CMS 7 LTS, and might change.
 *
 * Currently the "access" property is only used so no token creation + validation is made,
 * but will be extended further.
 */
return array(
	// Login screen of the TYPO3 Backend
	#'login' => array(
	#	'path' => '/login',
	#	'access' => 'public',
	#	'target' => Controller\LoginController::class . '::formAction'
	#),

	// Main backend rendering setup (previously called backend.php) for the TYPO3 Backend
	#'main' => array(
	#	'path' => '/main',
	#	'target' => Controller\BackendController::class . '::mainAction'
	#),
	
    // Register imagemap wizard
    #'wizard_imagemap' => array(
    #	'path' => '/wizard/tx_imagemapwizard/imagemap',
    #	'target' => \Barlian\ImagemapWizard\Controller\ImagemapWizardController::class . '::WizardAction'
    #	#'target' => 'tx_imagemapwizard_wizard::mainAction'
    #),
	'wizard_wfqbe_insert' => array(
		'path' => '/wizard/tx_wfqbe/insert',
		'target' => \Barlian\Wfqbe\Wizard\WfqbeInsertWizard::class . '::main'
	),
	'wizard_wfqbe_search' => array(
		'path' => '/wizard/tx_wfqbe/search',
		'target' => \Barlian\Wfqbe\Wizard\WfqbeSearchWizard::class . '::main'
	),
	'wizard_wfqbe_select' => array(
		'path' => '/wizard/tx_wfqbe/select',
		'target' => \Barlian\Wfqbe\Wizard\WfqbeSelectWizard::class . '::main'
	),
	
);