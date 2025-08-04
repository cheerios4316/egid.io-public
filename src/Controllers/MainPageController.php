<?php

namespace Src\Controllers;

use DateTime;
use DumpsterfirePages\Controller\BaseController;
use DumpsterfirePages\PageComponent;
use Src\Components\Pages\MainPageComponent\MainPageComponent;

class MainPageController extends BaseController
{
    protected MainPageComponent $mainPageComponent;

    public function __construct(MainPageComponent $mainPageComponent) {
        $this->mainPageComponent = $mainPageComponent;
    }
    public function getResult(): PageComponent
    {
        return $this->mainPageComponent->setYearsOld($this->fetchYearsOld());    
    }

    protected function fetchYearsOld(): int
    {
        if(empty($_ENV["BIRTHDAY"])) {
            return 0;
        }

        return (new DateTime($_ENV["BIRTHDAY"]))->diff(new DateTime())->y;
    }
}