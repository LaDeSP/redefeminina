<?php

use Slim\App;
use \App\Services\RegisterRoutesService;
use \App\AcessoRestrito\Application\Route\LoginRoutes;

return function (App $app) {
	/**
	 *AREA DE ACESSO AO PUBLICO
	*/
  $app->get('/', \App\AcessoPublico\Home::class);
  $app->get('/post/{content}', \App\AcessoPublico\Post::class);//remember to config param to store the name of the post.
  $app->get('/contato', \App\AcessoPublico\Contato::class);


};
