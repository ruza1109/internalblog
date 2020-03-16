<?php

namespace App\Repository;

use App\Database\Database;
use PDOException;

class CommentRepository extends AbstractRepository
{
    protected $table = 'comments';

    protected function getConnection()
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

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function find()
    {
        // TODO: Implement find() method.
    }
}