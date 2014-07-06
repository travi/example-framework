<?php

use travi\framework\controller\front\FrontController;

ini_set('log_errors', 'On');
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

date_default_timezone_set('America/Chicago');
putenv("TZ=America/Chicago");

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/db/db.conf';
require_once __DIR__ . '/../vendor/travi/framework/php/framework/src/core/init.php';

/** @var $frontController FrontController */
$frontController = Pd_Make::name('travi\\framework\\controller\\front\\FrontController');
$frontController->processRequest();