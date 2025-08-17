<?php

namespace Src\Controllers;

use DateTime;
use DumpsterfirePages\Controller\BaseController;
use DumpsterfirePages\Interfaces\IControllerParams;
use DumpsterfirePages\PageComponent;
use DumpsterfirePages\PageTemplate\PageTemplate;
use Src\Components\Documentation\SidebarComponent\SidebarComponent;
use Src\Components\HeaderComponent\HeaderComponent;
use Src\Components\MarkDownComponent\MarkDownComponent;
use Src\Components\Pages\DocumentationPageComponent\DocumentationPageComponent;
use Src\Helper\Documentation\DocumentationHelper;
use Src\Helper\Documentation\DocumentationSection;
use Throwable;

class DocumentationController extends BaseController implements IControllerParams
{
    protected array $params = [];

    protected string $sectionSlug = "get-started";

    protected static string $title = "Dumpsterfire";

    public function __construct(
        protected DocumentationPageComponent $documentationPageComponent,
        protected DocumentationHelper $documentationHelper,
        protected SidebarComponent $sidebarComponent,
        protected MarkDownComponent $markdownComponent
    ) { }

    public function getResult(): PageComponent
    {
        HeaderComponent::setTitle(self::$title);
        HeaderComponent::setUrl('/dumpsterfire');

        $fetchSlug = $this->fetchCurrentSlug();

        if(!empty($fetchSlug)) {
            $this->sectionSlug = $fetchSlug;
            HeaderComponent::setAnimate(false);
        }

        $page = $this->documentationPageComponent;

        try {
            $content = $this->documentationHelper->getSectionMarkdown($this->sectionSlug);
        } catch (Throwable $e) {
            $content = '';
        }

        $this->markdownComponent->setText($content);

        $sections = $this->getAllSections();
        $active = $this->getSectionBySlug($this->sectionSlug);

        $this->sidebarComponent->setSections($sections)->setActiveSection($active);

        $page->setSidebarComponent($this->sidebarComponent);
        $page->setMarkdownComponent($this->markdownComponent);

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