<?php

namespace MDH\Blog\Core\Database\Attributes;

#[\Attribute]
class Mapper
{
    public string $class;
    public function __construct(string $class)
    {
        $this->class = $class;
    }
}