<?php

namespace MDH\Blog\Core\Router;

use MDH\Blog\Core\Configurator;
use Traversable;

class RouteCollection implements \IteratorAggregate
{
    /** @var Route[]  */
    public $list = [];
    public function __construct(Configurator $configurator)
    {
        foreach ($configurator->getRoutes() as $routeName => $definition) {
            $route = $this->convertDefinitionToRoute($routeName, $definition);
            $this->add($route);
        }
    }

    public function add(Route $route): void {
        $this->list[] = $route;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->list);
    }

    protected function convertDefinitionToRoute(string $routeName, array $definition): Route
    {
        if (!$this->isDefinitionValid($definition)) {
            throw new \Exception("The route provided is not correctly formatted");
        }
        return (new Route())
            ->setName($routeName)
            ->setPath($definition['path'])
            ->setController($definition['controller'])
            ->setCallable($definition['callable'])
            ->setMethod($definition['method']);
    }

    protected function isDefinitionValid(array $definition): bool
    {
        return (array_key_exists('path', $definition)
            && array_key_exists('callable', $definition)
            && array_key_exists('controller', $definition))
            && array_key_exists('method', $definition);
    }
}