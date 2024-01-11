<?php

use Psr\Container\ContainerInterface;
use MDH\Blog\Core\Configurator;
use MDH\Blog\Core\Database\Database;
use MDH\Blog\Core\Router\RouteCollection;
use MDH\Blog\Core\Router\RouterFactory;
use MDH\Blog\Core\Renderer\RendererFactory;
// DI Container functions
use function DI\get;
use function DI\create;
use function DI\factory;

return [
    'app.core.configurator' => function (ContainerInterface $container) {
        return new Configurator($container);
    },
    'app.core.route.collection' => create(RouteCollection::class)
        ->constructor(get('app.core.configurator')),
    'app.core.router' => factory(
        [RouterFactory::class, 'build'])
        ->parameter('routeCollection', get('app.core.route.collection')),
    'app.core.db' => create(Database::class)
        ->constructor(get('app.core.configurator')),
    'app.core.renderer' => factory(
        [RendererFactory::class, 'create'])
        ->parameter('renderer', get('app.renderer.name'))
        ->parameter('options', get('app.renderer.options'))
];