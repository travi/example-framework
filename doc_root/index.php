<?php

use Travi\framework\controller\front\FrontController;

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../vendor/Travi/framework/php/framework/src/core/init.php';

/** @var $frontController FrontController */
$frontController = Pd_Make::name('Travi\\framework\\controller\\front\\FrontController');
$frontController->processRequest();