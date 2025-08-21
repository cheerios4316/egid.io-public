## Using components



### Rendering

To render a component, simply use the `::render()` method:

```php
$container = Container::getInstance();

$component = $container->create(SomeComponent::class);

$component->render(); 
```

`::render()` internally calls and echoes the result of `::content()`, which returns the renderer HTML as a string.

This means that if you only need a component's HTML (e.g. if you need to use Dumpsterfire components in other rendering systems) you can just use the `::content()` method:

```php
$htmlContent = $component->content();
```


### Pre-render setup

Components can implement the ISetup interface:

```php
use DumpsterfirePages\Component;
use DumpsterfirePages\Interfaces\ISetup;

class SomeComponent extends Component implements ISetup
```

the `ISetup` interface requires the implementation of a void `setup()` method, that will be executed right before
rendering, so if you need to perform any pre-render logic, that's where you wanna put it.

Example:

`SomeComponent.php`
```php
use ...;
class SomeComponent extends Component implements ISetup
{
    public $data = null;
    public function __construct(protected SomeHelper $someHelper) {}
    
    public function setup(): void
    {
        $this->data = $this->someHelper->getData();
    }
}
```

`view.SomeComponent.php`
```php
<!-- ... -->
<div class="some-component">
    <span>
        <?= $this->data ?>
    </span>
</div>
```

> `$this->data` is populated because `::setup()` was called by the renderer right before rendering.

### Client-side scripting

Any client-side logic (e.g. events) can be defined in `script.NameOfComponent.ts`.

Similarly to their PHP server-side counterparts, TypeScript component classes inherit from a base `Component` class, which
defines some logic and hooks useful for managing the client-side logic of a component.

The component generation script provides a minimal definition for a client-side class for the generated component, that
can be expanded upon as needed.

More specific info about this can be found in the "Client-side component logic" section of the documentation.