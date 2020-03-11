<?php

namespace App\Database;

use PDO;

class Database
{
    private static $instance = null;
    private $connection;
    private $host = 'localhost';
    private $dbName = 'internalblog';
    private $username = 'root';
    private $password = '';

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=' . $this->host . ';' . 'dbname=' . $this->dbName, $this->username,
        $this->password);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}