<?php

use travi\framework\controller\front\FrontController;

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../vendor/travi/framework/php/framework/src/core/init.php';

/** @var $frontController FrontController */
$frontController = Pd_Make::name('travi\\framework\\controller\\front\\FrontController');
$frontController->processRequest();