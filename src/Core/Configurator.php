<?php

namespace MDH\Blog\Core;

use Psr\Container\ContainerInterface;

class Configurator
{
    private array $routes = [];
    private array $parameters = [];

    public function __construct(private ContainerInterface $container)
    {
        $routesPath = $this->container->get('path.routes');
        $this->routes = $this->getData($routesPath);

        $paramsPath = $this->container->get('path.parameters');
        $this->parameters = $this->getData($paramsPath);
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    private function getData(string $path): array
    {
        $data = [];
        if (!file_exists($path)) {
            throw new \Exception($path . ' not found');
        }
        $data = require($path);
        $basename =  basename($path, '.php');
        $envPath = $this->container->get('path.env.' . $basename);
        if (file_exists($envPath)) {
            $envData = require($envPath);
            $data = array_merge($data, $envData);
        }

        return $data;
    }
}