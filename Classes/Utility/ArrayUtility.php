<?php

namespace Barlian\Wfqbe\Utility;

/**
 *
 * 
 * Merged classes tx_wfqbe_api_xml2array and tx_wfqbe_api_array2xml
 */
class ArrayUtility {

	/**
	* If a string is passed in, parse it right away.
	*/
	static function xml2array($xmlstring="") {		
		if ($xmlstring) {
			if (strpos($xmlstring, '<contentwfqbe>') !== false
			 || strpos($xmlstring, '<searchwfqbe>' ) !== false
			 || strpos($xmlstring, '<insertwfqbe>' ) !== false
			) {
				$API = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("tx_wfqbe_api_xml2data_structure");
				$data_structure = $API->parse($xmlstring);
				return $this->convert($data_structure);
			} else {
				return unserialize(stripslashes($xmlstring));
			}
		}
		return true;
	}
	
	/**
	 * Converts the structure in an associative array
	 */
	static function convert($struttura)	{
		if (sizeof($struttura["_ELEMENTS"]) == 0) {
			return trim($struttura["_DATA"]);
		} else {
			foreach($struttura["_ELEMENTS"] as $key => $value) {
				if (($value["_NAME"] == "item"    && $value["number"] != "")
				 || ($value["_NAME"] == "content" && $value["number"] != "")
				) {
					$data[$value["number"]] = $this->convert($value);
				} else {
					$data[$value["_NAME"]] = $this->convert($value);
				}
			}	
		}
		return $data;
	}
	
	/**
	 * Funzione per la codifica di un array in una stringa
	 */
	static function array2xml($data) {
		global $TYPO3_CONF_VARS;
		$config = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['wfqbe']);
				
		if ($config['mode'] == 'xml') {
			$line = "";
			foreach ($data as $key => $value) {
				if (is_numeric($key) && is_array($value)) {
					$key   = "content number='" . $key . "'";
					$key2  = "content";
				} elseif (is_numeric($key)) {
					$key   = "item number='" . $key . "'";
					$key2  = "item";
				} else {
					$key2  = $key;
				}
				if (is_array($value)) {
					$value = $this->array2xml($value);
				}
				if ($value != "") {
					$line  = $line . "<$key>" . $value . "</$key2>";
				}
			}
		   //$line = substr($line, 1);
		   return $line;
		} else {
			return addslashes(serialize($data));
		}
	}
	
}
