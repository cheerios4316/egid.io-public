<?php

namespace Src\Components\Documentation\SidebarSectionComponent;

/**
 * @var SidebarSectionComponent $this;
 */

?>

<a href="<?= $this->getSlug() ?>" class="
    sidebar-section-component w-full
    bg-neutral-900 rounded-xl
    p-4 py-2 md:py-4 px-2 border-purple-400
    text-neutral-200 font-bold
    cursor-pointer monospace
    transition-background duration-50
    <?= $this->isActive() ? "text-neutral-800 bg-purple-300" : "hover:bg-neutral-700"?>
    transition-all">
    <?= $this->getName() ?>
</a>