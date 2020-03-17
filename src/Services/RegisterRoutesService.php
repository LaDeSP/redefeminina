<?php
namespace App\Services;

use Slim\App;

class RegisterRoutesService {
	
	public function setRoute(App $app, array $array){
		
		foreach($array as $key => $value) {
			
			$app->any($key, $value);
			
		}
		
	}
	
}



?>
