<?php

declare(strict_types=1);

namespace Standout\MiddlewareStack\Domain\Services;

use Standout\MiddlewareStack\Domain\Contracts\MiddlewareInterface;
use Standout\MiddlewareStack\Domain\Contracts\RequestHandlerInterface;
use Standout\MiddlewareStack\Domain\Contracts\RequestInterface;

final class Stack implements RequestHandlerInterface
{
    /**
     * @var MiddlewareInterface[]
     */
    protected $middlewares = [];

    public function __construct(MiddlewareInterface ...$middlewares)
    {
        $this->middlewares = $middlewares;
    }

    private function withoutMiddleware(MiddlewareInterface $middleware): RequestHandlerInterface
    {
        return new self(
            ...array_filter(
                $this->middlewares,
                function ($m) use ($middleware) {
                    return $middleware !== $m;
                }
            )
        );
    }

    public function handle(RequestInterface $request): void
    {
        $middleware = $this->middlewares[0] ?? false;

        if ($middleware) {
            $middleware->process(
                $request,
                $this->withoutMiddleware($middleware)
            );
        }
    }
}
