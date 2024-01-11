<?php

use Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

if (method_exists(Dotenv::class, 'createImmutable')) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__), '.env.test');
    $dotenv->load();
}