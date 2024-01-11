<?php

namespace MDH\Blog\Core\Renderer;

interface Renderer
{
    public function render(string $template, ?array $options): string;
}