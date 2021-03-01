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