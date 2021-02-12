<?php

namespace Framework\Controllers;


class Controller 
{
    
    protected $viewpath = ROOT . "/views/";
    //protected $modelName = Model::class;
    protected $model;

    public function __construct()
    {
        //$this->model = new $this->modelName();
    }

    public function render($path, $variables = []) 
    {
        ob_start();
    
        extract($variables);

        require $this->viewpath . "$path.php";
    
        $pageContent = ob_get_clean();
    
        require $this->viewpath . "layout.php";
    }

    public function redirect($path)
    {
        header("Location: $path");
        exit();
    }

}