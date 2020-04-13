<?php

use DI\ContainerBuilder;
use Slim\App;
use Slim\Csrf\Guard;
use Slim\Factory\AppFactory;
use \RedBeanPHP\R;

require_once __DIR__ . '/../vendor/autoload.php';

// Loads Mustache Engine Template
require __DIR__ . '/../vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

// Start PHP session
session_start();

//Loading .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/../config/container.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Create an ReadBean instance and connects it to te database
$r= $container->get(R::class);
$r->setup( 'mysql:host=127.0.0.1;dbname=projeto', 'root', '' );

// Create App instance
$app = $container->get(App::class);

// Register CSRF Middleware On Container
$responseFactory = $app->getResponseFactory();
$container->set('csrf', function () use ($responseFactory) {
	return new Guard($responseFactory);
});

// Register CSRF Middleware To Be Executed On All Routes
$app->add('csrf');

// Register routes
(require __DIR__ . '/../config/routes.php')($app);

$app->run();
