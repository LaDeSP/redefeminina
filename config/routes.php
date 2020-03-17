<?php

use Slim\App;
use \App\Services\RegisterRoutesService;
use \App\AcessoRestrito\Application\Route\LoginRoutes;

return function (App $app) {
	/**
	 *AREA DE ACESSO AO PUBLICO
	 */
    $app->get('/', \App\AcessoPublico\ViewHelper\Home::class);
    $app->get('/parceiros', \App\AcessoPublico\ViewHelper\Parceiros::class);
    $app->get('/depoimentos', \App\AcessoPublico\ViewHelper\Depoimentos::class);
    $app->get('/contato', \App\AcessoPublico\ViewHelper\Contato::class);
    $app->get('/luta_contra_cancer', \App\AcessoPublico\ViewHelper\LutaContraCancer::class);
    $app->get('/outubro_rosa', \App\AcessoPublico\ViewHelper\OutubroRosa::class);
    $app->get('/como_ajudar', \App\AcessoPublico\ViewHelper\ComoAjudar::class);
	
	
	
	/**
	 *AREA RESTRITA
	 */
	RegisterRoutesService::setRoute(
		$app,
		LoginRoutes::getRoutes()
	);
	

};

