<?php

namespace Src\Controllers;

use DateTime;
use DumpsterfirePages\Controller\BaseController;
use DumpsterfirePages\Interfaces\IControllerParams;
use DumpsterfirePages\PageComponent;
use DumpsterfirePages\PageTemplate\PageTemplate;
use Src\Components\Documentation\SidebarComponent\SidebarComponent;
use Src\Components\Pages\DocumentationPageComponent\DocumentationPageComponent;
use Src\Helper\Documentation\DocumentationHelper;
use Src\Helper\Documentation\DocumentationSection;

class DocumentationController extends BaseController implements IControllerParams
{
    protected array $params = [];

    protected string $sectionSlug = "";

    public function __construct(
        protected DocumentationPageComponent $documentationPageComponent,
        protected DocumentationHelper $documentationHelper,
        protected SidebarComponent $sidebarComponent
        ) { }

    public function getResult(): PageComponent
    {
        $this->sectionSlug = $this->fetchCurrentSlug();
        $page = $this->documentationPageComponent;

        $sections = $this->getAllSections();

        $this->sidebarComponent->setSections($sections)->setActiveSlug($this->sectionSlug);

        $page->setSidebarComponent($this->sidebarComponent);
        
        return $page;
    }

    protected function getAllSections(): array
    {
        return $this->documentationHelper->getSectionList();
    }

    protected function getSectionBySlug(string $slug): ?DocumentationSection
    {
        return $this->documentationHelper->getBySlug($slug);
    }

    protected function fetchCurrentSlug(): string
    {
        if(!isset($this->params['sectionSlug'])) {
            return "";
        }

        return $this->params['sectionSlug'];
    }

    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }
}