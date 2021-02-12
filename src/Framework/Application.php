<?php

namespace Framework;

use Framework\Router\Router;
use Framework\Router\RouterException;

class Application
{

    public static Router $router;

    public function __construct(array $modules = [])
    {
        self::$router = new Router($_SERVER['REQUEST_URI']);
        
    }

    public static function init($routes)
    {
        self::$router = new Router($_SERVER['REQUEST_URI']);
        foreach($routes['GET'] as $path => $callback) {
            self::$router->get($path,$callback);
        }

        foreach($routes['POST'] as $path => $callback) {
            self::$router->post($path,$callback);
        }

        
    }

    public static function run()
    {
        try {
            self::$router->run();
        } catch(RouterException $e) {
            header('Location: /404');
        }
    }


    /**public function run(Request $request): Response
    {
        $uri = $request->getUri()->getPath();
        if(!empty($uri) && $uri[-1] === "/") {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }

        $response = new Response();
        $response->getBody()->write('Bonjour');
        
        return $response;
    }*/

}