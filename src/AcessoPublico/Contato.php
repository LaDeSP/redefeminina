<?php

namespace App\AcessoPublico;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;

final class Contato{
	private $m;

	public function __construct(Mustache_Engine $m){
		$this->m= $m;
	}

	public function __invoke(ServerRequest $request, Response $response): Response{
		$page = $this->m->render(
			"acesso_publico/contato.mustache"
		);

		$response->getBody()->write($page);
		return $response;
	}
}
