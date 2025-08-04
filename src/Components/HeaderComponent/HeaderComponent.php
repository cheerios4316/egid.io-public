<?php

namespace Src\Components\HeaderComponent;

use DumpsterfirePages\Component;

class HeaderComponent extends Component
{
    protected string $title = "> egid.io";

    protected bool $animate = false;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAnimate(): bool
    {
        return $this->animate;
    }
}