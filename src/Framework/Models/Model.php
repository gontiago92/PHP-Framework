<?php

namespace Framework\Models;

use Framework\Database;

abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findAll($options = null)
    {
        $req = $this->pdo->query("SELECT * FROM {$this->table} $options");

        return $req->fetchAll();
    }

    public function find($field, $value, $options = null)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $field = :$field $options");
        $req->execute([$field => $value]);

        return $req->fetch();
    }

}