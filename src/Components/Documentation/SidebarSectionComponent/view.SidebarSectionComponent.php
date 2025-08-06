<?php

namespace Src\Components\Documentation\SidebarSectionComponent;

/**
 * @var SidebarSectionComponent $this;
 */

?>

<a href="<?= $this->getSlug() ?>" class="
    sidebar-section-component w-full
    p-4 px-2 border-b border-purple-400
    text-neutral-200 font-bold
    hover:bg-neutral-700 cursor-pointer
    transition-background duration-50
    <?= $this->isActive() ? "bg-purple-300 text-neutral-800 hover:bg-purple-300" : ""?>">
    <?= $this->getName() ?>
</a>