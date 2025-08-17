<?php

namespace Src\Components\Documentation\SidebarComponent;

use DumpsterfirePages\Component;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Interfaces\ISetup;
use Src\Components\Documentation\SidebarSectionComponent\SidebarSectionComponent;
use Src\Helper\Documentation\DocumentationSection;

class SidebarComponent extends Component implements ISetup
{
    /** @var DocumentationSection[] $sections */
    protected array $sections = [];

    protected array $components = [];

    protected ?DocumentationSection $activeSection = null;

    public function __construct(protected Container $container) {}

    public function setup(): void
    {
        foreach($this->sections as $section) {
            $component = $this->container->create(SidebarSectionComponent::class);
            $component->setName($section->getName())->setSlug('/dumpsterfire/' . $section->getSlug());

            if($this->activeSection->getSlug() === $section->getSlug()) {
                $component->setActive(true);
            }

            $this->components[] = $component;
        }
    }

    public function setSections(array $sections): self
    {
        $this->sections = $sections;
        return $this;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function setActiveSection(?DocumentationSection $section): self
    {
        $this->activeSection = $section;
        return $this;
    }

    public function getActiveSection(): ?DocumentationSection
    {
        return $this->activeSection;
    }
}