<?php

use DI\ContainerBuilder;
use Slim\App;
use Slim\Csrf\Guard;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/RedBeanPHP5_4_2/rb.php';
require __DIR__ . '/../vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

// Start PHP session
session_start();

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Create App instance
$app = $container->get(App::class);

// Create an ReadBean instance and connects it to te database
$r= $container->get(R::class);
$r->setup( 'mysql:host=127.0.0.1;dbname=projeto', 'root', '' );

// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;

