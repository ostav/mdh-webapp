<?php

namespace MDH\Blog\Core\Container;

use DI\Attribute\Inject;
use Psr\Container\ContainerInterface;

trait ContainerAwareTrait
{
    public function getContainer(): ?ContainerInterface
    {
        return ContainerBuilderFactory::getContainer();
    }
}