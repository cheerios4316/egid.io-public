<?php

namespace Src\Components\ImageCtaComponent;

/**
 * @var ImageCtaComponent $this
 */

?>

<div class="image-cta-component
    relative w-full
    md:w-96 h-48 md:h-56
    rounded-lg text-purple-200
    text-lg md:transition-all
    shadow-lg border-purple-800
    md:border-2 hover:border-2
    md:hover:scale-110">
    <a class="" href="<?= $this->getHref() ?>" target="<?= $this->getTarget() ?: "" ?>">
        <img src="<?= $this->getImageSrc() ?>" alt="<?= $this->getImageAlt() ?>"
            class="w-full h-full object-cover rounded-lg absolute">
        <div class="
        absolute z-20
        h-full w-full
        flex items-end
        p-2 text-lg
        underline
        <?= $this->hasDarkText() ? "text-purple-800" : "" ?>
        ">
            <?= $this->getText() ?>
        </div>
    </a>
</div>