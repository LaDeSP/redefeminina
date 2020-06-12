<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use App\Services\GetPageContentService;

return [

  App::class => function (ContainerInterface $container) {
      AppFactory::setContainer($container);
      $app = AppFactory::create();

      // Optional: Set the base path to run the app in a sub-directory
      // The public directory must not be part of the base path
      //$app->setBasePath('/slim4-tutorial');

      return $app;
  },

  GetPageContentService::class => function (ContainerInterface $container) {
  	return new GetPageContentService(__DIR__."/../");
  },

  Mustache_Engine::class => function (ContainerInterface $container) {

  	return new Mustache_Engine(
  		array(
  			'template_class_prefix' => '__MyTemplates_',
  			'cache' => __DIR__.'/../tmp/cache/mustache',
  			#'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
  			#'cache_lambda_templates' => true,
  			'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../ui'),
  			'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../ui'),
  			#'helpers' => array('i18n' => function($text) {}),
  			'escape' => function($value) {
  				$value = (new Parsedown())->text($value);
  				return html_entity_decode($value, ENT_COMPAT, 'UTF-8');
  			},
  			#'charset' => 'ISO-8859-1',
  			#'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
  			#'strict_callables' => true,
  			'pragmas' => [Mustache_Engine::PRAGMA_FILTERS]
  		)
  	);
  },
];
