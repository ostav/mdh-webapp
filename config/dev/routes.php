<?php

use MDH\Blog\Blog\Controller\DevController;

return [
    'app.dev.home' => [
        'controller' => DevController::class,
        'method' => 'GET' ,
        'path' => '/',
        'callable' => 'index'
    ],
    'app.dev.article' => [
        'controller' => DevController::class,
        'method' => 'GET' ,
        'path' => '/article/{id:number}',
        'callable' => 'article'
    ],
    // ---------- Admin routes ---------- //
    'app.dev.admin' => [
        'controller' => DevController::class,
        'method' => 'GET' ,
        'path' => '/admin',
        'callable' => 'admin'
    ]
];