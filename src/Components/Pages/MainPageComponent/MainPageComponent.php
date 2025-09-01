<?php

namespace Src\Components\Pages\MainPageComponent;

use DumpsterfirePages\Component;
use DumpsterfirePages\Container\Container;
use DumpsterfirePages\Interfaces\ISetup;
use DumpsterfirePages\PageComponent;
use Src\Components\ImageCtaComponent\ImageCtaComponent;
use Src\Components\LinkComponent\LinkComponent;
use Src\Components\SectionDivisionComponent\SectionDivisionComponent;

class MainPageComponent extends PageComponent implements ISetup
{
    protected int $yearsOld = 0;

    protected string $title = "egid.io | home";

    public function __construct(
        protected ImageCtaComponent $imageCtaComponentGithub,
        protected ImageCtaComponent $imageCtaComponentDumpsterfire,
        protected ImageCtaComponent $imageCtaComponentLinkedin,
        protected LinkComponent $sourceCodeLinkComponent,
        protected Container $container
    ) {
    }
    public function setup(): void
    {

        $this->sourceCodeLinkComponent
            ->setHref("https://github.com/cheerios4316/egid.io-public")
            ->setTarget("_blank")
            ->setText("Check out the source code")
        ;

        $this->imageCtaComponentGithub
            ->setHref("https://github.com/cheerios4316/")
            ->setImageSrc("/public/img/github.png")
            ->setTarget(target: "_blank")
            ->setText("GitHub profile")
        ;

        $this->imageCtaComponentLinkedin
            ->setHref("https://www.linkedin.com/in/egidio-pignataro-2b7900243/")
            ->setImageSrc("/public/img/linkedin.png")
            ->setTarget(target: "_blank")
            ->setText("Linkedin page")
            ->setDarkText(true)
        ;

        $this->imageCtaComponentDumpsterfire
            ->setHref("/dumpsterfire")
            ->setImageSrc("/public/img/dumpsterfire.png")
            ->setText("Dumpsterfire (documentation)")
            ->setTarget(target: "_blank")
        ;
    }

    public function getImageCtaComponents(): array
    {
        return [
            $this->imageCtaComponentDumpsterfire,
            $this->imageCtaComponentLinkedin,
            $this->imageCtaComponentGithub,
        ];
    }

    public function generateDivider(string $text): SectionDivisionComponent
    {
        return $this->container->create(SectionDivisionComponent::class)->setText($text);
    }

    public function getSourceCodeLinkComponent(): LinkComponent
    {
        return $this->sourceCodeLinkComponent;
    }

    public function getYearsOld(): int
    {
        return $this->yearsOld;
    }

    public function setYearsOld(int $yearsOld): self
    {
        $this->yearsOld = $yearsOld;
        return $this;
    }
}