<?php

require_once __DIR__ . '/vendor/autoload.php';

use DumpsterfirePages\App\App;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Router\DumpsterfireRouter;
use Src\Components\HeaderComponent\HeaderComponent;
use Src\Controllers\DocumentationController;
use Src\Controllers\MainPageController;

$container = Container::getInstance();

$app = App::new()
    ->runInitActions()
;

$router = DumpsterfireRouter::new();

$router
    ->registerRoute('/', MainPageController::class)
    ->registerRoute('/dumpsterfire', DocumentationController::class)
    ->registerRoute('/dumpsterfire/{sectionSlug}', DocumentationController::class)
;

$app
    ->setRouter($router)
    ->setPageTemplateHeader(HeaderComponent::class)
    //->connectDatabase($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_PORT"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"])
    ->run()
;
