<?php

namespace MDH\Blog\Core\Router;

class Route
{
    private string $name;

    private string $path;

    private string $callable;

    private string $controller;

    private string $method = 'GET';
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    public function getCallable(): string
    {
        return $this->callable;
    }

    public function setCallable(string $callable): self
    {
        $this->callable = $callable;
        return $this;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $controller): self
    {
        $this->controller = $controller;
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }
}