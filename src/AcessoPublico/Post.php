<?php

namespace App\AcessoPublico;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;
use App\Services\GetPageContentService;

final class Post{
	private $m;
	private $getpage;

	public function __construct(Mustache_Engine $m, GetPageContentService $getpage){
		$this->m = $m;
		$this->getpage = $getpage;
	}

	public function __invoke(ServerRequest $request, Response $response, $args): Response{
		$post = $args['content'];
		$page = $this->m->render(
			"acesso_publico/post.mustache",
			array(
				"post" => array(
					"artigo" => $this->getpage->get(getenv("PATH_TO_PAGES").$post.".md")
				)
			)
		);
		$response->getBody()->write($page);
		return $response;
	}
}
