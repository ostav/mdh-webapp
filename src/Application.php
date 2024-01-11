<?php

namespace MDH\Blog;

use Dotenv\Dotenv;
use MDH\Blog\Core\Container\ContainerBuilderFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Application
{
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        $dotenv->required(['ENVIRONMENT']);

        $container = ContainerBuilderFactory::getContainer();
        $router = $container->get('app.core.router');

        return $router->handle($request);
    }
}