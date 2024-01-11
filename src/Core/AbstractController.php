<?php

namespace MDH\Blog\Core;

use Laminas\Diactoros\Response\HtmlResponse;
use MDH\Blog\Core\Container\ContainerAwareInterface;
use MDH\Blog\Core\Container\ContainerAwareTrait;
use MDH\Blog\Core\Renderer\Renderer;
use Psr\Http\Message\ResponseInterface;

class AbstractController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function render(string $templates, array $options=[]): ResponseInterface
    {
        /** @var Renderer $renderer */
        $renderer = $this->getContainer()->get('app.core.renderer');
        $template = $renderer->render($templates, $options);

        return new HtmlResponse($template, 200, []);
    }
}