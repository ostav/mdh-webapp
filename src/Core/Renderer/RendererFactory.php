<?php

namespace MDH\Blog\Core\Renderer;

final class RendererFactory
{
    public static function create(string $renderer, array $options): Renderer
    {
        return match ($renderer)
        {
          'twig' => new TwigRenderer($options),
          default => throw new \Exception('Unknown renderer')
        };
    }
}