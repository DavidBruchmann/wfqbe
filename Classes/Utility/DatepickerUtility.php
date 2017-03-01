<?php

namespace Barlian\Wfqbe\Utility;

class DatepickerUtility {

	/**
	 *
	 */
	function showDate($value, $name, $id)	{
		$fieldValue = $this->getFieldValue($value, $name);
		return '<input id="'.$id.'" class="date" type="text" name="tx_wfqbe_pi1['.$name.']" value="'.
			$this->charToEntity($fieldValue).'" />';
	}
	
	/**
	 *
	 */
	function showTime($value, $name, $id)	{
		$fieldValue = $this->getFieldValue($value, $name);
		return '<input id="'.$id.'" class="time" type="text" name="tx_wfqbe_pi1['.$name.']" value="'.
			$this->charToEntity($fieldValue).'" />';
	}
	
	/**
	 * @TODO: replace pibase and piVars
	 */
	function getFieldValue($value, $name) {
		$fieldValue = '';
		if ($this->pibase->piVars[$name] != '') {
			$fieldValue = $this->pibase->piVars[$name];
		} elseif ($this->pibase->piVars[$value['field']] != '') {
			$fieldValue = $this->pibase->piVars[ $value['field'] ];
		}
		return $fieldValue;
	}

	/**
	 * This function is used to replace single quotes with the entity
	 * @TODO: move function to StringUtility
	 */
	function charToEntity($str) {
		$str = str_replace("'", "&#039;", $str);
		$str = str_replace('"', "&quot;", $str);
		return $str;
	}

}
