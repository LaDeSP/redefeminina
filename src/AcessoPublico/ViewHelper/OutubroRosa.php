<?php

namespace App\AcessoPublico\ViewHelper;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;

final class OutubroRosa
{
	private $m;
	
	public function __construct(Mustache_Engine $m)
    {
    	$this->m= $m;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {	
    	$result= $this->m->render("acesso_publico/outubro_rosa.mustache");
    	
    	$response->getBody()->write($result);
        return $response;
    }
}

