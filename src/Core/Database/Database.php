<?php

namespace MDH\Blog\Core\Database;

use MDH\Blog\Core\Configurator;

class Database
{
    protected $settings;

    public function __construct(Configurator $configurator)
    {
        $this->settings =  $configurator->getParameters()['database'];
    }

    public function getDB()
    {
        return PDOFactory::getPDO($this->settings);
    }
}