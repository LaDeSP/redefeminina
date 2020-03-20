<?php
namespace App\Services;

class ConvertArrayToObjService {

	function convertToObject($array, $class) {
		$object = new $class();
			foreach ($array as $key => $value) {
				if (is_array($value)) {
					$value = convertToObject($value);
				}
				$object->$key = $value;
			}
			return $object;
	}
}
