<?php

namespace Src\Helper\Documentation;

class DocumentationSection
{
    /** @var DocumentationSection[]  */
    protected array $subsections = [];

    protected string $name;

    protected string $slug;

    protected string $content;

    public function addSubsections(...$subsections): self
    {
        $this->subsections = array_merge($this->subsections, $subsections);

        return $this;
    }

    public function getSubsections(): array
    {
        return $this->subsections;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}