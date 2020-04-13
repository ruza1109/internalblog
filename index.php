<?php

use App\Core\Router\Router;

require __DIR__ . '/vendor/autoload.php';

$router = new Router();
return $router->load('routes.php')->direct(requestUrl(), $_SERVER['REQUEST_METHOD']);