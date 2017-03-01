<?php

/*
 * Created on 09/gen/09
 * Author mauro
 * 
 */ 
class tx_wfqbe_mod1_ajax	{

	function tx_wfqbe_mod1_ajax()	{}

 	public function ajaxFieldTypeHelp($params, &$ajaxObj) {
		//$this->init();
		$LANG = $GLOBALS['LANG'];
		$LANG->includeLLFile('EXT:wfqbe/mod1/locallang.xml');

		// the content is an array that can be set through $key / $value pairs as parameter
		$ajaxObj->addContent('help', $LANG->getLL('help_'.\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('field')).'<br />');
	}
 
}
