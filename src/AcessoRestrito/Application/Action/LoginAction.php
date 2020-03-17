<?php

namespace App\AcessoRestrito\Application\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;

final class LoginAction {
	private $m;
	
	public function __construct(Mustache_Engine $m)
    {
    	$this->m= $m;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {	
    	$result= $this->m->render('acesso_restrito/index.mustache', array("post" => $_POST));
    	$response->getBody()->write($result);
        return $response;
    }
}

