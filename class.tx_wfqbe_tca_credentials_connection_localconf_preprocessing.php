<?php

class tx_wfqbe_tca_credentials_connection_localconf_preprocessing	{
	
	public function main(&$params, &$pObj)	{
		
		global $TYPO3_CONF_VARS;
		
		if (is_array($TYPO3_CONF_VARS['EXTCONF']['wfqbe']['__CONNECTIONS']))	{
			foreach ($TYPO3_CONF_VARS['EXTCONF']['wfqbe']['__CONNECTIONS'] as $key => $value)	{
				$params['items'][]	= array($value['name'], $key);
			}
		}
		
	}
	
}