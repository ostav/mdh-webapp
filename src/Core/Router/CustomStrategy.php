<?php

namespace MDH\Blog\Core\Router;

use League\Route\Http\Exception\MethodNotAllowedException;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Route;
use League\Route\Strategy\StrategyInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;

class CustomStrategy implements StrategyInterface
{
    protected $responseDecorators = [];

    protected function decorateResponse(ResponseInterface $response): ResponseInterface
    {
        foreach ($this->responseDecorators as $decorator) {
            $response = $decorator($response);
        }
        return $response;
    }
    public function addResponseDecorator(callable $decorator): StrategyInterface
    {
        $this->responseDecorators[] = $decorator;
        return $this;
    }

    public function getMethodNotAllowedDecorator(MethodNotAllowedException $exception): MiddlewareInterface
    {
        // TODO: Implement logic
    }

    public function getNotFoundDecorator(NotFoundException $exception): MiddlewareInterface
    {
        return new NotFoundHandlerMiddleware($exception);
    }

    public function getThrowableHandler(): MiddlewareInterface
    {
        return new ThrowableHandlerMiddleware();
    }

    public function invokeRouteCallable(Route $route, ServerRequestInterface $request): ResponseInterface
    {
        $controller = $route->getCallable();
        $response = $controller($request, $route->getVars());
        return $this->decorateResponse($response);
    }
}