<?php

namespace Src\Components\Pages\DocumentationPageComponent;

use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Interfaces\ISetup;
use DumpsterfirePages\PageComponent;
use DumpsterfirePages\PageTemplate\PageTemplate;
use Src\Components\Documentation\SidebarComponent\SidebarComponent;
use Src\Components\ImageCtaComponent\ImageCtaComponent;
use Src\Components\LinkComponent\LinkComponent;
use Src\Components\SectionDivisionComponent\SectionDivisionComponent;

class DocumentationPageComponent extends PageComponent implements ISetup
{
    protected int $yearsOld = 0;

    protected string $title = "egid.io | dumpsterfire";

    protected ?SidebarComponent $sidebarComponent = null;

    public function __construct(
    ) {}
    public function setup(): void
    {
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSidebarComponent(): SidebarComponent
    {
        return $this->sidebarComponent;
    }

    public function setSidebarComponent(SidebarComponent $sidebarComponent): self
    {
        $this->sidebarComponent = $sidebarComponent;
        return $this;
    }
}