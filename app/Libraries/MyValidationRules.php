<?php

namespace App\Libraries;

class MyValidationRules
{
	public function valid_name($str): bool
	{
		if (!preg_match('/^[a-z ‘\-\']+$/i', $str) && $str != "") {
			return false;
		}
		return true;
	}

	public function valid_NIK($str): bool
	{
		if ($str === 0 or $str == '' or $str == null) {
			return true;
		}
		if (!preg_match('/^[0-9]+$/i', $str)) {
			return false;
		}
		if (strlen($str) != 16) {
			return false;
		}
		return true;
	}
}
