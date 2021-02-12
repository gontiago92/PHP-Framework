<?php

$GLOBALS['config'] = [
    'mysql' => [
        'host'      =>  '127.0.0.1',
        'dbname'    =>  'bteam',
        'user'      =>  'root',
        'pass'      =>  'root'
    ],
    'routes' => [
        'GET' => [
            '/'                             => 'Index#index',
            '/post'                        => 'Post#index',
            '/post/show/:id'               => 'Post#show',
            '/post/create'                 => 'Post#create',
            '/404'                          =>"ErrorHandler#notFound"
        ],
        'POST' => [
            '/'         => 'Index#index'
        ]
    ]
];