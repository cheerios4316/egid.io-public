## Routing 

Routing in Dumpsterfire is managed through the App class, which, using instances of routers, registers routes
and associates them to controllers.

The abstraction for a router offered by Dumpsterfire is called `DumpsterfireRouter`.

e.g.
```php
use DumpsterfirePages\Router\DumpsterfireRouter;

$router = DumpsterfireRouter::new();

$router
    ->registerRoute('/some-route', SomeController::class)
;
```

### Routing with URL params

Routes can include any number of URL param:
```php
$router->registerRoute('/some-route/{someParam}')
```

To use the `someParam` value, your controller needs to implement the `IControllerParams` interface, which requires
a method called setParams that takes a parameter of type array.

e.g.
```php
public function setParams(array $params): self
{
    $this->params = $params;
    return $this;
}
```

then:

```php
public function getData(): array
{
    return [
        "data" => $this->params['someParam'] ?? null
    ];
}
```

### Nested routers

Routers can be nested into each other with the `::addRouter` method. It can be seen as if it was `array_merge` for routes.

e.g.
```php
$router1 = DumpsterfireRouter::new()->registerRoute('/some-route', SomeController::class);
$router2 = DumpsterfireRouter::new()->registerRoute('/other-route', OtherController::class);

$router1->addRouter($router2);
```