<?php

namespace Src\Components\Documentation\SidebarComponent;

use DumpsterfirePages\Component;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Interfaces\ISetup;
use Src\Components\Documentation\SidebarSectionComponent\SidebarSectionComponent;

class SidebarComponent extends Component implements ISetup
{
    /** @var \Src\Helper\Documentation\DocumentationSection[] $sections */
    protected array $sections = [];

    protected array $components = [];

    protected ?string $activeSlug = null;

    public function __construct(protected Container $container) {}

    public function setup(): void
    {
        foreach($this->sections as $section) {
            $component = $this->container->create(SidebarSectionComponent::class);
            $component->setName($section->getName())->setSlug($section->getSlug());

            if($this->activeSlug === $section->getSlug()) {
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

    public function setActiveSlug(string $activeSlug): self
    {
        $this->activeSlug = $activeSlug;
        return $this;
    }
}