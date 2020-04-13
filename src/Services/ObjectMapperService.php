<?php
namespace App\Services;

use Slim\App;

class ObjectMapperService {

	function map($objGoal, $objectBeingMapped){
     foreach($objectBeingMapped as $property => $value) {
        $objGoal->$property = $value;
     }

     return $objGoal;
	}

}



?>
