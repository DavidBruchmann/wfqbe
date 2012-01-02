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
        $ajaxObj->addContent('help', $LANG->getLL('help_'.t3lib_div::_GP('field')).'<br />');
	}
 	
 }
 
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/mod1/class.tx_wfqbe_mod1_ajax.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/wfqbe/mod1/class.tx_wfqbe_mod1_ajax.php']);
}

?>
