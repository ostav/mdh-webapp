<?php

namespace MDH\Blog\Core\Renderer;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer implements Renderer
{
    private Environment $twig;
    public function __construct(array $options)
    {
        $loader = new FilesystemLoader($options['pathToTemplate']);
        if (key_exists('paths', $options)) {
            foreach($options['paths'] as $path) {
                $loader->addPath($path['templateDir'], $path['namespace']);
            }
        }
        $this->twig = new Environment($loader,[]);
    }
    public function render(string $template, ?array $options): string
    {
        return $this->twig->render($template, $options);
    }
}