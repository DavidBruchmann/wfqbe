<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005-2007 Mauro Lorenzutti (Webformat srl) (mauro.lorenzutti@webformat.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * API per la conversione di una stringa XML in un array multi-dimensionale
 *
 * @author	Mauro Lorenzutti (Webformat srl) <mauro.lorenzutti@webformat.com>
 */


class tx_wfqbe_api_xml2array {
	var $extKey = 'tx_wfqbe_api';	// The extension key.
	
	var $cObj;
	var $conf;
	
	var $parser;
    var $node_stack = array();
	

	/**
	 * Main function
	 */
	function main($conf, $cObj)	{
		$this->conf=$conf;
		$this->cObj = $cObj;
		return;
	}


    /**
    * If a string is passed in, parse it right away.
    */
    function xml2array($xmlstring="") {
		
        if ($xmlstring) {
            if (strpos($xmlstring, '<contentwfqbe>')!==false || strpos($xmlstring, '<searchwfqbe>')!==false || strpos($xmlstring, '<insertwfqbe>')!==false)	{
            	$API = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("tx_wfqbe_api_xml2data_structure");
	            $data_structure = $API->parse($xmlstring);
	            return $this->convert($data_structure);
            }	else	{
	            return unserialize(stripslashes($xmlstring));
            }
        }
        return true;
    }
    
    
    /**
     * Converts the structure in an associative array
     */
    function convert($struttura)    {
		if (sizeof($struttura["_ELEMENTS"])==0)  {
            return trim($struttura["_DATA"]);
        }   else    {
            foreach($struttura["_ELEMENTS"] as $key => $value)  {
                if (($value["_NAME"]=="item" && $value["number"]!="")||($value["_NAME"]=="content" && $value["number"]!=""))
                    $data[$value["number"]] = $this->convert($value);
                else
                    $data[$value["_NAME"]] = $this->convert($value);
				
            }
			
        }
		
        return $data;
    }

}
