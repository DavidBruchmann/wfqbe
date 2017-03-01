<?php

namespace Barlian\Wfqbe\Utility;

class StringUtility {


	/**
	 * This function is used to replace single quotes with the entity
	 * @TODO: rename function to quoteToEntity
	 */
	static function charToEntity($str) {
		$str = str_replace("'", "&#039;", $str);
		$str = str_replace('"', "&quot;", $str);
		return $str;
	}

	/**
	 * This function is used to replace the entity with the single quotes
	 * @TODO: rename function to entityToQuote
	 */
	static function entityToChar($str) {
		$str = str_replace("&#039;", "'", $str);
		$str = str_replace("&quot;", '"', $str);
		return $str;
	}

}
