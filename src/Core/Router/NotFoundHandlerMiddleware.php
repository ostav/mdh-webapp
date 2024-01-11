<?php

namespace MDH\Blog\Core\Router;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NotFoundHandlerMiddleware extends AbstractHandler implements MiddlewareInterface
{
    protected $exception;
    protected  $code = 404;
    public function __construct(\Throwable $exception)
    {
        $this->exception = $exception;
    }
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $renderer = $this->getContainer()->get('app.core.renderer');
        $template = $renderer->render('404.html.twig', [
            'code' => $this->code,
            'message' => $this->exception->getMessage()
        ]);

        return new HtmlResponse($template, 404, []);
    }
}