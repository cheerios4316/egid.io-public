<?php

namespace Src\Components\ImageCtaComponent;

use Src\Components\LinkComponent\LinkComponent;

class ImageCtaComponent extends LinkComponent
{
    protected string $imageSrc = "";

    protected string $imageAlt = "";

    protected bool $darkText = false;

    public function setDarkText(bool $darkText): self
    {
        $this->darkText = $darkText;
        return $this;
    }

    public function setImageSrc(string $imageSrc): self
    {
        $this->imageSrc = $imageSrc;
        return $this;
    }

    public function setImageAlt(string $imageAlt): self
    {
        $this->imageAlt = $imageAlt;
        return $this;
    }

    public function getImageSrc(): string
    {
        return $this->imageSrc;
    }

    public function getImageAlt(): string
    {
        return $this->imageAlt;
    }

    public function hasDarkText(): bool
    {
        return $this->darkText;
    }
}