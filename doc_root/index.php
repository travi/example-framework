<?php

use travi\framework\controller\front\FrontController;
use travi\framework\utilities\Environment;


date_default_timezone_set('America/Chicago');
putenv("TZ=America/Chicago");

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/db/db.conf';
require_once __DIR__ . '/../vendor/travi/framework/php/framework/src/core/init.php';

/** @var Environment $environment */
$environment = $container->dependencies()->get('environment');

ini_set('log_errors', 'On');
if ($environment->isProduction()) {
    // Report all errors
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
} else {
    // Report all errors except E_NOTICE
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', 'On');
}

/** @var $frontController FrontController */
$frontController = Pd_Make::name('travi\\framework\\controller\\front\\FrontController');
$frontController->processRequest();