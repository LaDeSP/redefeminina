<?php

use Selective\Config\Configuration;
use Slim\App;
use Slim\Csrf\Guard;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add routing middleware
    $app->addRoutingMiddleware();

    $container = $app->getContainer();
    
    // Add error handler middleware
    $settings = $container->get(Configuration::class)->getArray('error_handler_middleware');
    $displayErrorDetails = (bool)$settings['display_error_details'];
    $logErrors = (bool)$settings['log_errors'];
    $logErrorDetails = (bool)$settings['log_error_details'];
	
	$responseFactory = $app->getResponseFactory();

	// Register CSRF Middleware On Container
	$container->set('csrf', function () use ($responseFactory) {
		return new Guard($responseFactory);
	});

	// Register CSRF Middleware To Be Executed On All Routes
	$app->add('csrf');

    $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);
};


