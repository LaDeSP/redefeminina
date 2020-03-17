<?php
namespace App\Services;

use Slim\Csrf\Guard;
use Psr\Container\ContainerInterface;

class CSRFService {
	private $nameKey;
	private $valueKey;
	private $name;
	private $value;
	private $csrf;
	
	/**
	 * var tipo ContainerInterface
	 */
	private $c;
	
	
	/**
	 * Construtor
	 *
	 * recebe argumento do tipo ContainerInterface pela
	 * injecao de dependencia php di
	 */
	public function __construct(ContainerInterface $container) {
		$this->c= $container;
		$this->csrf = $this->c->get('csrf');
    }
	
	public function getArr($request){
		return array(
			"valueKey"=>$this->csrf->getTokenValueKey(),
			"nameKey"=>$this->csrf->getTokenNameKey(),
			"value"=>$request->getAttribute($this->csrf->getTokenValueKey()),
			"name"=>$request->getAttribute($this->csrf->getTokenNameKey())
			
		);
	}

}
