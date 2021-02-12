<?php

namespace Framework\Controllers;

class ErrorHandler extends Controller
{
    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        $this->render('404');
    }
}