<?php

namespace App\AcessoPublico;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;
use App\Services\GetPageContentService;


final class Home{
	private $m;
	private $getpage;

	public function __construct(Mustache_Engine $m, GetPageContentService $getpage){
		$this->m = $m;
		$this->getpage = $getpage;
	}

	public function __invoke(ServerRequest $request, Response $response): Response{
		$page = $this->m->render(
			"acesso_publico/home.mustache",
			array(
				"home" => array("quemSomos" => $this->getpage->get(getenv("PATH_TO_PAGES")."home.md"))
			)
		);

		$response->getBody()->write($page);
	  return $response;
	}
}
