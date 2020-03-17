<?php

namespace App\AcessoRestrito\Application\ViewHelper;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;
use Slim\Csrf\Guard;
use Psr\Container\ContainerInterface;
use App\Services\CSRFService as Csrf;

final class LoginRenderPage {	
	/**
	 * var tipo Mustache_Engine
	 */
	private $m;
	
	/**
	 * var tipo ContainerInterface
	 */
	private $c;
	
	/**
	 * Construtor
	 *
	 * recebe argumentos do tipo Mustache_Engine e ContainerInterface pela
	 * injecao de dependencia php di
	 */
	public function __construct(Mustache_Engine $m, ContainerInterface $container) {
    	$this->m= $m;
		$this->c= $container;
    }
	
    public function __invoke(ServerRequest $request, Response $response): Response {	
		// CSRF token name and value
		$csrf= new Csrf($this->c);
		
		
    	$result= $this->m->render(
			"acesso_restrito/login/login.mustache", 
			array(
				"csrf"=> $csrf->getArr($request)
			)
		);
    	
    	$response->getBody()->write($result);
        return $response;
    }
}

