## Install

```bash 

$ composer require standout/middleware-stack

```


## How to
```php

<?php

use Standout\MiddlewareStack\Domain\Services;

$stack = new Stack(
    $middleware1,
    $middleware2,
    $middleware3
);

$stack->handle($request);

```

## Usage

**standout/middleware-stack** provides the ```Standout\MiddlewareStack\Domain\Services\Stack``` class. All it has to know in order to be instantiable is:
* middlewares, that implement the ```Standout\MiddlewareStack\Domain\Contracts\MiddlewareInterface```

To perform a sequential processing of injected middlewares you have to call stack's ```handle``` method with:
* an instance of ```Standout\MiddlewareStack\Domain\Contracts\RequestInterface```.

Stack implements ```Standout\MiddlewareStack\Domain\Contracts\RequestHandlerInterface```.


## Example
```php

<?php

use Standout\MiddlewareStack\Domain\Contracts\MiddlewareInterface;
use Standout\MiddlewareStack\Domain\Contracts\RequestHandlerInterface;
use Standout\MiddlewareStack\Domain\Contracts\RequestInterface;
use Standout\MiddlewareStack\Domain\Services\Stack;

// you decide what middleware you want to put in a stack.

class TransactionMiddleware implements MiddlewareInterface
{
      public function process(RequestInterface $request, RequestHandlerInterface $handler): void
    {

    }
}

class LogMessageMiddleware implements MiddlewareInterface
{
    ...
}

final class MessageRequest implements RequestInterface
{

}

$request = new MessageRequest();


$stack = new Stack(
    new TransactionMiddleware(),
    new LogMessageMiddleware()
);

$stack->handle($request);

```

## Credit
[idealo/php-middleware-stack](https://github.com/idealo/php-middleware-stack)