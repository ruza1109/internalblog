<?php

namespace App\Traits;

use App\Database\Database;

trait Connection
{
    public function getConnection()
    {
        try
        {
            $connection = Database::getInstance();
            $connection = $connection->getConnection();
            return $connection;
        }
        catch (PDOException $exception)
        {
            echo("Database connection failed: ".$exception->getMessage());
        }
    }
}