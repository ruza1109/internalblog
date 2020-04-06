<?php

namespace App\Core\Router;

use App\Exception\NotFoundException;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function load($file)
    {
        $router = new Router();
        require $file;
        return $router;
    }

    public function get($url, $controllerMethod)
    {
        $this->routes['GET'][$url] = $controllerMethod;
    }

    public function post($url, $controllerMethod)
    {
        $this->routes['POST'][$url] = $controllerMethod;
    }

    public function direct($url, $requestMethod)
    {
        try
        {
            if(!array_key_exists($url, $this->routes[$requestMethod]))
            {
                throw new NotFoundException('No route defined for this URL!');
            }
            dd($this->routes[$requestMethod][$url]);
        }
        catch (NotFoundException $exception)
        {
            return $exception->handleError();
        }
    }
}