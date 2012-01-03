<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005-2012 Mauro Lorenzutti (Webformat srl) (mauro.lorenzutti@webformat.com)
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
 * BE module
 *
 * @author	Mauro Lorenzutti <mauro.lorenzutti@webformat.com>
 */


require_once (t3lib_extMgm::extPath('wfqbe').'pi1/class.tx_wfqbe_pi1.php');

class tx_wfqbe_belib	{
	
	var $title = 'DB Management';
	var $page_id = 0;
	
	
	/**
	 * 
	 * Main function
	 * @param unknown_type $caller
	 */
	function getContent($caller)	{
		global $BE_USER,$LANG;
		
		$content = '';
		
		if (t3lib_div::_GP('id')=='' || t3lib_div::_GP('id')<0)	{
			$content = $LANG->getLL('not_allowed');
		}
		
		$this->page_id = intval(t3lib_div::_GP('id'));
		$backend_id = intval(t3lib_div::_GP('tx_wfqbe_backend'));
		
		$where = '';
		if (t3lib_div::testInt($backend_id) && $backend_id>0)	{
			$where .= ' AND uid='.$backend_id;
		}
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_wfqbe_backend', 'deleted=0 AND hidden=0 AND pid='.$this->page_id.$where, '', 'sorting ASC');
		if ($res!==false && $GLOBALS['TYPO3_DB']->sql_num_rows($res)>1)	{
			$content = $this->getAvailableBackend($res);
		}	elseif ($res!==false && $GLOBALS['TYPO3_DB']->sql_num_rows($res)==1)	{
			$content = $this->getList($GLOBALS['TYPO3_DB']->sql_fetch_assoc($res));
		}	elseif ($res!==false)	{
			$content = $LANG->getLL('not_available');
		}	else	{
			$content = 'An error has occured while retrieving database configuration. Please contact the system administrator and report this error.';
		}
		
		return $content;
	}
	
	
	/**
	 * 
	 * Return title
	 */
	function getTitle()	{
		return $this->title;
	}
	
	
	/**
	 * 
	 * List all available backend actions
	 * @param unknown_type $res
	 */
	function getAvailableBackend($res)	{
		global $LANG;
		$this->title = $LANG->getLL('please_select');
		$content = '<p>'.$LANG->getLL('please_select_more').'</p>';
		$content .= '<table class="typo3-dblist">';
		$content .= '<tr class="t3-row-header"><td class="col-title" colspan="2">'.$LANG->getLL('please_select').'</td></tr>';
		
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))	{
			$content .= '
			<tr class="db_list_normal">
				<td class="col-title"><a href="index.php?&M=web_txwfqbeM2&id='.$this->page_id.'&tx_wfqbe_backend='.$row['uid'].'">'.$row['title'].'</a></td>
				<td>'.$row['description'].'</td>
			</tr>
			';
		}
		
		$content .= '</table>';
		return $content;
	}
	
	
	
	/**
	 * 
	 * Action selected, returns the records list
	 * @param unknown_type $res
	 */
	function getList($backend)	{
		$content = t3lib_div::view_array($backend);
		
		/*
		$PI1 = t3lib_div::makeInstance('tx_wfqbe_pi1');
		
		$PI1->conf['ff_data']['queryObject'] = $backend['uid'];
		
		$this->title = $backend['title'];
		$content = '';
		
		$form_built = '';
		$content = $LIST->do_general('', $form_built);
		*/
		
		return $content;
	}
	
}


?>