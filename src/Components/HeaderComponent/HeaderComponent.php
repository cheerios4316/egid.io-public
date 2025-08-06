<?php

namespace Src\Components\HeaderComponent;

use DumpsterfirePages\Component;

class HeaderComponent extends Component
{
    protected string $title = "> egid.io";

    protected bool $animate = true;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAnimate(): bool
    {
        return $this->animate;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}