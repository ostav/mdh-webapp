<?php

namespace Unit;

use MDH\Blog\Core\Container\ContainerAwareTrait;
use PHPUnit\Framework\TestCase;
use MDH\Blog\Core\Container\ContainerAwareInterface;

class AbstractTestCase extends TestCase implements ContainerAwareInterface
{
    use ContainerAwareTrait;
}