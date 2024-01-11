<?php

namespace MDH\Blog\Core\Container;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

class ContainerBuilderFactory
{
    private static ?ContainerInterface $container = null;
    public static function getContainer(): ContainerInterface
    {
        if (self::$container === null) {
            $builder = new ContainerBuilder();
            $builder->useAttributes(true);
            $definitionsPath = dirname(__DIR__) . '/../../config/definitions.php';
            if (!file_exists($definitionsPath)) {
                throw new \Exception("The container can not be instanciated");
            }
            $definitions = require($definitionsPath);
           $builder->addDefinitions($definitions);

            self::$container = $builder->build();
        }

        return self::$container;
    }
}