<?php declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use MDH\Blog\Application;

$application = new Application();
$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$response = $application->run($request);
$emitter = new SapiEmitter();
$emitter->emit($response);
