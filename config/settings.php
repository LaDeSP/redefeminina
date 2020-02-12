<?php

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/Berlin');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

// Error Handling Middleware settings
$settings['error_handler_middleware'] = [

    // Should be set to false in production
    'display_error_details' => false,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

// Database settings
$settings['db'] = [
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'username' => 'root',
    'database' => 'projeto',
    'password' => '',   
];


$settings['view'] = [
	'template_class_prefix' => '__MyTemplates_',
    'cache' => dirname(__FILE__).'/tmp/cache/mustache',
    #'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
    #'cache_lambda_templates' => true,
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../templates'),
    'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../templates'),
    #'helpers' => array('i18n' => function($text) {}),
    'escape' => function($value) {
        return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
    },
    #'charset' => 'ISO-8859-1',
    #'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
    #'strict_callables' => true,
    'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
];

return $settings;

