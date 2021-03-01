<?php

declare(strict_types=1);

namespace Standout\MiddlewareStack\Domain\Contracts;

interface MiddlewareInterface
{
    public function process(RequestInterface $request, RequestHandlerInterface $handler): void;
}
