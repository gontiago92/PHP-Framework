<?php

define('ROOT', dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/core/init.php';

use Framework\Application;

Application::init($GLOBALS['config']['routes']);

Application::run();