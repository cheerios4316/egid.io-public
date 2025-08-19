<?php

require_once __DIR__ . '/vendor/autoload.php';

use DumpsterfirePages\App\App;
use DumpsterfirePages\AssetsManager\AssetsManager;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\InitActions\DotEnvInit;
use DumpsterfirePages\Router\DumpsterfireRouter;
use Src\Components\HeaderComponent\HeaderComponent;
use Src\Controllers\DocumentationController;
use Src\Controllers\MainPageController;

class SampleLogger implements \DumpsterfirePages\Interfaces\LoggerInterface
{
    public function log(string $message): \DumpsterfirePages\Interfaces\LoggerInterface
    {
        dump($message);die();return $this;
        return $this;
    }
}

$container = Container::getInstance();

$assetsManager = $container->get(AssetsManager::class);

$app = App::new()
    ->setLogger(new SampleLogger())
    ->init()
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
