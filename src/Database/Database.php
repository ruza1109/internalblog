<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=' . env("DB_HOST") . ';' . 'dbname=' . env("DB_NAME"), env("DB_USERNAME"),
                env("DB_PASSWORD"));

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, env("ERR_MODE"));
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, env("DEFAULT_FETCH_MODE"));

        } catch (PDOException $exception) {
            echo("Database connection failed: ".$exception->getMessage());
        }

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