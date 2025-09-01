## Controllers

Controllers are objects used to generate page components, pass them objects and data, and ultimately, render the page
component and serve it to the browser.

Dumpsterfire offers 2 controller types:
- BaseController
- ApiController

A BaseController can be created via the scaffolding tool using the command
```
npx create-dumpsterfire-app --controller <NameOfController>
```

or the shorthand included in generated Dumpsterfire projects:
```
npm run gen:controller -- <NameOfController>
```

which will create a class that extends BaseController at path `src/Controllers/<NameOfController>.php`

To create an ApiController, simply change the generated class' parent from `BaseController` to `ApiController`, erase
the `getResult` method and implement a `getData(): array` method.

> A command to generate a new ApiController class is scheduled for a future update of create-dumpsterfire-app.

### BaseController

A BaseController class is used to return a page component to the main App orchestrator, which calls the renderer and
prints the generated HTML as a result.

e.g.
```php
class SomeController extends BaseController
```

### ApiController

An ApiController class differs slightly in usage from a BaseController.

Rather than implementing the `getResult` method, it must implement a `getData` method. \
In `ApiController`, `getResult` is already defined and calls the abstract `getData` to get the data to send to a newly
instantiated `JsonPageComponent`, that, when rendered, sets the result's content type as `content\json` and prints the
json-encoded data returned by `getData`.

e.g.
```php
class SomeEndpointController extends ApiController
{
    public function getData(): array
    {
        return ["some" => "data"];
    }
}
```

### Application life-cycle

> @todo move this section into the app section

The role of the controller in the context of the full cycle of the application is the following:
1. a request is sent to the server;
2. `DumpsterfirePages\App` captures the request and calls the routes matcher to check if the requested URL is handled by Dumpsterfire;
3. if a controller is matched to the request URL, it is instantiated and its `getResult` method called;
4. `getResult` generates the page component and the App echoes it into the result.