<?php

namespace Src\Components\Documentation\SidebarSectionComponent;

use DumpsterfirePages\Component;

class SidebarSectionComponent extends Component
{
    protected string $name = "";
    protected array $subsections = [];

    protected bool $active = false;

    protected string $slug = "";

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function setSubsections(array $subsections): self
    {
        $this->subsections = $subsections;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getSubsections(): array
    {
        return $this->subsections;
    }
}