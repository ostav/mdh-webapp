<?php

namespace MDH\Blog\Core\Router;

use MDH\Blog\Core\Container\ContainerAwareInterface;
use MDH\Blog\Core\Container\ContainerAwareTrait;

class AbstractHandler implements ContainerAwareInterface
{
    use ContainerAwareTrait;
}