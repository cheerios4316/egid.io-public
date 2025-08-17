<?php

namespace Src\Components\Documentation\SidebarSectionComponent;

/**
 * @var SidebarSectionComponent $this;
 */

?>

<a href="<?= $this->getSlug() ?>" class="
    sidebar-section-component w-full
    p-4 px-2 border-purple-400
    bg-gradient-to-r to-transparent
    text-neutral-200 font-bold
    cursor-pointer
    transition-background duration-50
    <?= $this->isActive() ? "from-purple-300 text-neutral-800 hover:from-purple-300" : "from-purple-950 hover:from-purple-800"?>
    transition-all">
    <?= $this->getName() ?>
</a>