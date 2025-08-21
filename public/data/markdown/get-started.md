## **Welcome!**
This is the official documentation for the Dumpsterfire framework. \
 \
These are the projects that make Dumpsterfire work: \

[dumpsterfire-pages](https://github.com/cheerios4316/dumpsterfire-pages) | base package \
[poteriforti](https://github.com/cheerios4316/poteriforti) | data source for the project initialization script\
[create-dumpsterfire-app](https://github.com/cheerios4316/create-dumpsterfire-app) | project initialization script

This documentation is still work in progress. If any crucial piece of information is missing, feel free to tell me about it.

Lastly, if you want to see more of my work, check out [my personal homepage](/)!

----

## **Get started**

Dumpsterfire only requires two components installed on your machine to be able to function:
- Docker Compose
- Node and NPM

Dumpsterfire is meant to run on Docker, and it is not ready to run on bare metal just yet.

The steps to fire up a Dumpsterfire project are the following:

1. Run the script: `npx create-dumpsterfire-app`
2. Attach a shell to the container and run `npm run project:setup` inside the container
3. Every time you need to run `npm` or `composer` commands, do so through the Docker shell
4. If you want, check out the sample project. Otherwise, run `npx create-dumpsterfire-app --purge`;
