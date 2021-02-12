<?php

namespace Framework\Http;

class Request 
{

    public $request;
    public $query;
    public $server;

    public function __construct()
    {
        $this->request = $_POST;
        $this->query = new Query($_GET);
        $this->server = $_SERVER;
    }

    public function getMethod()
    {
        return $this->request['REQUEST_METHOD'];
    }

    public function getUrl()
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    /*protected static $server;

    protected static $post;

    protected static $get;

    protected static $request;

    protected static $env;

    protected static $files;

    protected static $cookie;


    public function __construct()
    {
        
    }

    public static function createFromGlobals()
    {
        self::$server = $_SERVER;

        self::$post = $_POST;

        self::$get = $_GET;

        self::$request = $_REQUEST;

        self::$env = $_ENV;

        self::$files = $_FILES;

        self::$cookie = $_COOKIE;
    }

    public static function getServer()
    {
        return self::$server;
    }
*/
    

}