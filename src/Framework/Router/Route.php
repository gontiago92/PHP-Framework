<?php


namespace Framework\Router;


class Route
{
    private $path;
    private $callable;
    private $matches = [];

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url)
    {
        if(isset($url)) {
            $url = trim($url, '/');

            $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
            
            $regex = "#^$path$#";

            if(!preg_match($regex, $url, $matches)) {
                return false;
            }

            array_shift($matches);
            $this->matches = $matches;

            return true;
        }
    }

    public function call()
    {
        if(is_string($this->callable)) {
            $params = explode('#', $this->callable);

            if($params[0] != "ErrorHandler") {
                $controller = "Framework\Controllers\\" . $params[0] . "Controller";
            } else {
                $controller = "Framework\Controllers\\" . $params[0];
            }
            $controller = new $controller();

            return call_user_func_array([$controller, $params[1]], $this->matches);
        }
        return call_user_func_array($this->callable, $this->matches);
    }
}