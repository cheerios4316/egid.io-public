## Components

Components are self-contained elements that can be rendered independently.

### Introduction

Dumpsterfire defines two main component types:
- Component
- PageComponent

as well as a JsonPageComponent class which doesn't need to be used by the developer, as it is used by the ApiController
(more on this in the Controllers section).

Components are usually composed of up to 4 files:

1. Model (nomenclature: `MyExampleComponent`)
2. View (nomenclature: `view.MyExampleComponent.php`)
3. Style (nomenclature: `style.MyExampleComponent.css`)
4. Script (nomenclature: `script.MyExampleComponent.ts`)

The only file required to have a technically functioning component is the Model file,
but it generally makes sense to have at least a view file for any component (except components of
type JsonPageComponent). The reason for this is explained in the section of this documentation about
component renderers.

### Component types

#### Component
Component is the base type of component. Base components are general purpose and can be used for pretty much anything.

When rendered, a component pulls the view file and prints it into the page after running the PHP inside.

#### PageComponent
PageComponent is the return type expected by the `::getResult()` method of any Controller class except ApiController
(more on this in the Controllers section).

The difference between a PageComponent and a regular Component lies in the renderer used when calling the `::content()`
method.

Checking out the PageComponent class source, you'll see it defines this:

```php
protected string $defaultRenderer = PageRenderer::class;
```

The PageRenderer wraps a ComponentRenderer instance and uses it to populate and render a whole HTML document, itself
built using components, including the globally defined header and footer components (if present).