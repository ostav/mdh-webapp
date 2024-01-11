<?php

return [
    'app.renderer.name' => 'twig',
    'app.renderer.options' => [
        'pathToTemplate' => __DIR__ . '/../../templates',
        'paths' => [
            [
                'templateDir' =>  __DIR__ . '/../../templates/admin',
                'namespace' => 'admin'
            ]
        ]
    ]
];