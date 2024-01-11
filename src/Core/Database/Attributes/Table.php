<?php

namespace MDH\Blog\Core\Database\Attributes;

#[\Attribute]
class Table
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}