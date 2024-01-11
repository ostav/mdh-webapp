<?php

namespace MDH\Blog\Core\Router;

use League\Route\Router;
use MDH\Blog\Core\Container\ContainerBuilderFactory;
use Psr\Http\Server\RequestHandlerInterface;

class RouterFactory
{
   public static function build(RouteCollection $routeCollection): RequestHandlerInterface
   {
       $container = ContainerBuilderFactory::getContainer();
       $routes = $routeCollection->getIterator();
       $router = new Router();

       foreach($routes as $route) {
           if (!$container->has($route->getController())) {
               throw new Exception("Unkown controller " . $route->getController());
           }
           $controller = $container->get($route->getController());
           $router
               ->map(
                   $route->getMethod(),
                   $route->getPath(),
                   [$controller, $route->getCallable()])
               ->setName($route->getName());
           $router->setStrategy(new CustomStrategy());
       }

       return $router;
   }
}