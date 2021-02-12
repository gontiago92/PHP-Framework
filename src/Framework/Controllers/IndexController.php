<?php

namespace Framework\Controllers;

class IndexController extends Controller
{

    //protected $modelName = Index::class;


    public function index() 
    {
        $this->render('index');
    }

}