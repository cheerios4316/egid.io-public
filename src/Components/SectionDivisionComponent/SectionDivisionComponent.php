<?php

namespace Src\Components\SectionDivisionComponent;

use DumpsterfirePages\Component;

class SectionDivisionComponent extends Component
{
    protected string $text = "";

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
}