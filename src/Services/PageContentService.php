<?php
namespace App\Services;

use Slim\App;

class PageContentService {
	private $root;
	
		
	function __construct($root){
		$this->root= $root;
	}
	
	
	public function get(string $path){
		return file_get_contents($this->root . $path);
	}

}



?>
