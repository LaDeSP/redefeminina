<?php

namespace App\AcessoPublico\View;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Mustache_Engine;
use App\Services\PageContentService;
use Parsedown;

final class OutubroRosa
{
	private $m;
	private $getpage;
	
	public function __construct(Mustache_Engine $m, PageContentService $getpage)
    {
    	$this->m = $m;
    	$this->getpage = $getpage;
    }
    
    public function __invoke(ServerRequest $request, Response $response): Response
    {	
    	$result = $this->m->render("acesso_publico/acesso_a_informacoes.mustache",
			array(
				"informacoes" => $this->getpage->get(getenv("PATH_TO_PAGES")."outubro_rosa.md")
				)
    	);
    	
    	$response->getBody()->write($result);
        return $response;
    }
}

