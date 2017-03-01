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
 * Set of useful functions
 *
 * @author	Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 */


class tx_wfqbe_utils{
	var $extKey = 'wfqbe';	// The extension key.
	
	
	/**
	 * This function is used to add a list of hidden inputs to pass values from a page to another
	 * @param array vars: array to convert in list of hidden inputs
	 * @return string list of hidden inputs
	 */
	function getHiddenFields($vars, $sub='', $exclude=-1)	{
		$html = '';
		if ($sub!='')
			$sub = '['.$sub.']';
		foreach ($vars as $key => $value)	{
			if ($key.""!=$exclude)	{
				if (is_array($value))	{
					foreach ($value as $k => $v)
						$html .= '<input type="hidden" name="Tx_Wfqbe_Pi1'.$sub.'['.$key.']['.$k.']" value="'.$v.'" />';
				}	else	{
					$html .= '<input type="hidden" name="Tx_Wfqbe_Pi1'.$sub.'['.$key.']" value="'.$value.'" />';
				}
			}
		}
		return $html;
	}
	
}
