<?php

namespace App\Repository;

use App\Traits\Connection;

abstract class AbstractRepository
{
    use Connection;

    protected $table;

    public abstract function all();

    public abstract function create();

    public abstract function find();
}