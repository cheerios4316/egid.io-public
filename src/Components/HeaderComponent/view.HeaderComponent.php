<?php

namespace Src\Components\HeaderComponent;

/**
 * @var HeaderComponent $this
 */

?>

<div
    class="
    header-component    w-full
    bg-neutral-900      p-8
    flex                justify-center
    items-center        rounded-bl-lg
    rounded-br-lg       border-b-4
    border-purple-700   h-26"

    data-animate="<?= $this->getAnimate() ? "true" : "false" ?>"
>
    <h1 class="header-component__title header-component__title--hidden font-bold text-2xl text-purple-400"><?= $this->getTitle() ?></h1>
</div>