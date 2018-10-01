<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

define('ROOT_PATH', dirname(__FILE__));

session_start();

$settings = require __DIR__ . '/App/Src/settings.php';

$app = new \Slim\App($settings);

require __DIR__ . '/App/Src/dependencies.php';
require __DIR__ . '/App/Src/routes.php';

$app->run();