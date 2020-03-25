<?php

namespace App\Core;

use App\Exception\NotFoundException;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Repository\TopicRepository;
use App\Repository\UserRepository;

class Container
{
    private $services = [];
    private $definitions = [];
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new Container();
            self::$instance->registerService();
        }

        return self::$instance;
    }

    private function registerService()
    {
        $this->services = [
            'UserRepository' => function (self $container) {
                return new UserRepository();
            },
            'TopicRepository' => function (self $container) {
                return new TopicRepository();
            },
            'CommentRepository' => function (self $container) {
                return new CommentRepository();
            },
            'CategoryRepository' => function (self $container) {
                return new CategoryRepository();
            },
        ];
    }

    public function getService($serviceName)
    {
        try
        {
            if(!array_key_exists($serviceName, $this->services))
            {
                throw new NotFoundException("The Service: <i> $serviceName </i> does not exist!", 404);
            }

            if(!array_key_exists($serviceName, $this->definitions))
            {
                $this->set($serviceName);
            }

            return $this->definitions[$serviceName];
        }
        catch (NotFoundException $exception)
        {
            echo $exception->handleError();
        }
    }

    private function set($serviceName)
    {
        $closure = $this->services[$serviceName];
        $this->definitions[$serviceName] = $closure($this);
    }
}