<?php

namespace Src\Components\LinkComponent;

use DumpsterfirePages\Component;

class LinkComponent extends Component
{
    protected string $href = "";
    protected string $text = "";
    protected ?string $target = null;

    public function setHref(string $href): static
    {
        $this->href = $href;
        return $this;
    }

    public function setText(string $text): static
    {
        $this->text = $text;
        return $this;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;
        return $this;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }
}