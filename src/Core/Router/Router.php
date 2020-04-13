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

            if(array_key_exists($url, $this->routes[$requestMethod]))
            {
                return $this->callMethod(...explode('@', $this->routes[$requestMethod][$url]));
            }
        }
        catch (NotFoundException $exception)
        {
            return $exception->handleError();
        }
    }

    private function callMethod($controller, $method, $parameters = [])
    {
        try
        {
            $controller = "App\\Controllers\\{$controller}";
            $controller = new $controller;

            if(!method_exists($controller, $method))
            {
                throw new NotFoundException("Method $method doesn't exist in $controller!");
            }

            return $controller->$method($parameters);
        }
        catch (NotFoundException $exception)
        {
            return $exception->handleError();
        }
    }
}