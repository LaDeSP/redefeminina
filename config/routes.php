<?php

use Slim\App;
use \App\Services\RegisterRoutesService;
use \App\AcessoRestrito\Application\Route\LoginRoutes;

return function (App $app) {
	/**
	 *AREA DE ACESSO AO PUBLICO
	 */
    $app->get('/', \App\AcessoPublico\View\Home::class);
    $app->get('/parceiros', \App\AcessoPublico\View\Parceiros::class);
    $app->get('/depoimentos', \App\AcessoPublico\View\Depoimentos::class);
    $app->get('/contato', \App\AcessoPublico\View\Contato::class);
    $app->get('/luta_contra_cancer', \App\AcessoPublico\View\LutaContraCancer::class);
    $app->get('/outubro_rosa', \App\AcessoPublico\View\OutubroRosa::class);
    $app->get('/como_ajudar', \App\AcessoPublico\View\ComoAjudar::class);
    $app->get('/test', function (Request $request, Response $response) {
           $response->getBody()->write("Hello, Todo");
           return $response;
       });


	/**
	 *AREA RESTRITA
	 *
	RegisterRoutesService::setRoute(
		$app,
		LoginRoutes::getRoutes()
	);
	*/

};
