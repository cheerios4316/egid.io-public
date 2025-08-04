<?php

namespace Src\Components\HeaderComponent;

/**
 * @var HeaderComponent $this
 */

?>

<div class="
    header-component    w-full
    bg-neutral-900      p-8
    flex                justify-center
    items-center        rounded-bl-lg
    rounded-br-lg       border-b-4
    border-purple-700   h-26
    font-bold text-4xl text-purple-400" data-animate="<?= $this->getAnimate() ? "true" : "false" ?>">
    <div class="flex">
        <h1 class="header-component__title header-component__title--hidden"><?= $this->getTitle() ?></h1><span
            class="blinker-element">▮</span>
    </div>
</div>