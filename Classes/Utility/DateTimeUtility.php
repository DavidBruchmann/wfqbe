<?php

namespace Barlian\Wfqbe\Utility;

class DateTimeUtility {
	
	/**
	 * dateFormat is d-m-Y
	 */
	function date2unixtime($date)	{
		$dateArray = explode('-', $date);
		$day	= $dateArray[0];
		$month	= $dateArray[1];
		$year	= $dateArray[2];
		return mktime(0, 0, 0, $month, $day, $year);
	}
	
	/**
	 * timeFormat is H:M
	 */
	function time2unixtime($date) {
		$timeArray = explode(':', $date);
		$hour = $timeArray[0];
		$minute = $timeArray[1];
		return mktime($hour, $minute, 0, 1, 1, 1970);
	}
	
	/**
	 * dateFormat is d-m-Y
	 */
	function unixtime2date($timestamp) {
		$dateFormat = 'd-m-Y';
		return date($dateFormat,$timestamp);
	}

	/**
	 * timeFormat is H:i
	 */
	function unixtime2time($timestamp) {
		$timeFormat = 'H:i';
		return date($timeFormat,$timestamp);
	}


	/**
	 * This function convertes a human readable date (e.g.: "02.02.08" or "1.1.2008") in a timestamp (Fabian Moser and Mauro Lorenzutti)
	 */
	function get_datestamp($date, $form) {
		$val = $this->parseDate($date, $form['form']['format']);

		if (is_array($val) && $val['error_count']==0) {
			return mktime($val['hour'], $val['minute'], $val['second'], $val['month'], $val['day'], $val['year']);
		} else {
			return 0;
		}
	}


	/**
	 * This function convertes a timestamp in an human readable date (dd.mm.yyyy)  (Fabian Moser and Mauro Lorenzutti)
	 */
	function get_dateFromTimestamp($timestamp, $form) {
		$format = 'd-m-Y';
		return date($format,$timestamp);
	}


	/**
	 * This function checks the correctness of a date given as an human readable date (e.g.: "02.02.08" or "1.1.2008") (Fabian Moser and Mauro Lorenzutti)
	 * It checks the semantical correctness too. e.g.: That exists no 29.02.2005 -> return false
	 */
	function is_dateValid($date, $form) {
		$val = $this->parseDate($date, $form['form']['format']);
		if (is_array($val) && $val['error_count']==0) {
			if (!checkdate($val['month'], $val['day'], $val['year'])) {
				return false;
			} else {
				return true;
			}
		}

		return false;
	}


	/**
	 * 
	 */
	function parseDate($date, $format) {
		$array = array();

		$calendarDateFormats = array(
			'%d/%m/%Y',
			'%d-%m-%Y',
			'%d.%m.%Y',
			'%m/%d/%Y',
			'%m-%d-%Y',
			'%m.%d.%Y',
			'%Y-%m-%d',
			'dd-mm-yy',
			'dd.mm.yy',
			'dd/mm/yy',
			'mm-dd-yy',
			'mm.dd.yy',
			'mm/dd/yy'
		);

		$calendarDateTimeFormats = array(
			'%H:%M %d/%m/%Y',
			'%H:%M %d-%m-%Y',
			'%H:%M %d.%m.%Y',
			'%H:%M %m/%d/%Y',
			'%H:%M %m-%d-%Y',
			'%H:%M %m.%d.%Y',
		);

		if (\TYPO3\CMS\Core\Utility\GeneralUtility::inArray($calendarDateTimeFormats, $format)) {
			$temp = explode(' ', $date);
			$temp2 = explode(' ', $format);
			$date = $temp[1];
			$format = $temp2[1];
			$temp = explode(':', $temp[0]);
			$array['hour'] = $temp[0];
			$array['minute'] = $temp[1];
			$array['second'] = 0;
		}

		switch ($format) {
			case 'dd/mm/yy':
				$temp = explode('/', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
			case 'dd-mm-yy':
				$temp = explode('-', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
			case 'dd.mm.yy':
				$temp = explode('.', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
			case 'mm/dd/yy':
				$temp = explode('/', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case 'mm.dd.yy':
				$temp = explode('.', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case 'mm-dd-yy':
				$temp = explode('-', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case '%d/%m/%Y':
				$temp = explode('/', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
			case '%d-%m-%Y':
				$temp = explode('-', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
			case '%m/%d/%Y':
				$temp = explode('/', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case '%m-%d-%Y':
				$temp = explode('-', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case '%m.%d.%Y':
				$temp = explode('.', $date);
				$array['day']=$temp[1];$array['month']=$temp[0];$array['year']=$temp[2];
				break;
			case '%Y-%m-%d':
				$temp = explode('-', $date);
				$array['day']=$temp[2];$array['month']=$temp[1];$array['year']=$temp[0];
				break;
			case '%d.%m.%Y':
			default:
				$temp = explode('.', $date);
				$array['day']=$temp[0];$array['month']=$temp[1];$array['year']=$temp[2];
				break;
		}

		return $array;
	}

}
