<?php

namespace App\Repository;

abstract class AbstractRepository
{
    protected $table;

    protected abstract function getConnection();

    public abstract function all();

    public abstract function create();

    public abstract function find();
}