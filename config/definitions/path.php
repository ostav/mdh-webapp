<?php

use function DI\string;
use function DI\env;

return [
    'env' => env('ENVIRONMENT'),
    // ---------- DIR
    'dir.config' => string(dirname(__DIR__)),
    'dir.env.config' => string('{dir.config}/{env}'),
    // ---------- FILES
    'path.routes' => string('{dir.config}/routes.php'),
    'path.env.routes' => string('{dir.env.config}/routes.php'),
    'path.parameters' => string('{dir.config}/parameters.php'),
    'path.env.parameters' => string('{dir.env.config}/parameters.php'),
];