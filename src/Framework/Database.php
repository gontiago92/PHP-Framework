<?php

namespace Framework;

use PDO;

class Database
{

    private static $pdo;
    private static $options = [];

    public static function getInstance()
    {
        if(is_null(self::$pdo)) {
            self::$options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];

            self::$pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/dbname') , Config::get('mysql/user'), Config::get('mysql/pass'), self::$options);

        }

        return self::$pdo;
        
    }

}