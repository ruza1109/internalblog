<?php

use App\Core\Router\Router;
use App\Core\Request;

require __DIR__ . '/vendor/autoload.php';

$router = new Router();
return $router->load('routes.php')->direct(Request::url(), Request::method());