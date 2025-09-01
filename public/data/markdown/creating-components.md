## Creating components

#### Component

`Component` is the base component type.

To create a component, run the following command:

```
npx create-dumpsterfire-app --component <NameOfComponent>
```

or the shorthand included in package.json with the project generation:

```
npm run gen:component -- <NameOfComponent>
```

> Component names need to end with "Component". This is not enforced, but it's required in order for components to function properly.

> If you run into file permission issues when using generation commands, try running them on your host machine rather than the container's shell.

This script will create a new component of name `<NameOfComponent>` at path `./src/Components/<NameOfComponent>`

The component will be generated with all the files that a component can have, but any unwanted ones can be deleted if unnecessary. \
Also, the generated component will already implement `ISetup`, which can also be removed if not needed.

#### PageComponent

To generate a page component, follow the same steps as for a regular component, then change the parent class from Component to PageComponent.

> A script that directly generates a PageComponent component is scheduled for a future update of create-dumpsterfire-app.

Apart from this, page components are used in exactly the same way as regular components.