<?php

use DI\ContainerBuilder;
use Slim\App;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Loads Mustache Engine Template
require __DIR__ . '/../vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

//Loading .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

//Creating container for DI
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../config/container.php');
$container = $containerBuilder->build();

// Create App instance
$app = $container->get(App::class);

// Register routes
(require __DIR__ . '/../config/routes.php')($app);

$app->run();
