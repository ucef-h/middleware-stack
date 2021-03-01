<?php

declare(strict_types=1);

namespace Standout\MiddlewareStack\Domain\Contracts;

interface RequestHandlerInterface
{
    public function handle(RequestInterface $request): void;
}
