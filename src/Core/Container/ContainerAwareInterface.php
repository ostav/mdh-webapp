<?php

namespace MDH\Blog\Core\Container;

use Psr\Container\ContainerInterface;

interface ContainerAwareInterface
{
    public function getContainer(): ?ContainerInterface;
}