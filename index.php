<?php

require_once __DIR__ . '/vendor/autoload.php';

use DumpsterfirePages\App\App;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Router\DumpsterfireRouter;
use Src\Components\HeaderComponent\HeaderComponent;
use Src\Controllers\MainPageController;

$container = Container::getInstance();

$app = App::new()
    ->runInitActions()
;

$router = DumpsterfireRouter::new();

$router->registerRoute('/', MainPageController::class);

$app
    ->setRouter($router)
    ->setPageTemplateHeader(HeaderComponent::class)
    ->connectDatabase($_SERVER["DB_HOST"], $_SERVER["DB_NAME"], $_SERVER["DB_PORT"], $_SERVER["DB_USERNAME"], $_SERVER["DB_PASSWORD"])
    ->run()
;