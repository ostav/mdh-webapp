<?php

namespace Unit\Core;

use MDH\Blog\Core\Configurator;
use Unit\AbstractTestCase;

final class ConfiguratorTest extends AbstractTestCase
{
    public function testRoutesAreCorrectlyLoaded()
    {
        $container = $this->getContainer();
        $configurator = new Configurator($container);

        $this->assertIsArray($configurator->getRoutes());
        $this->assertIsArray($configurator->getParameters());
    }
}