<?php

namespace Src\Components\Documentation\SidebarComponent;

/**
 * @var SidebarComponent $this ;
 */

?>

<div class="sidebar-component flex flex-col md:contents relative md:static md:px-0">
    <div class="px-4">
        <div class="mt-4
    menu-button text-purple-400
    xl:hidden p-4 py-2 xl:py-4
    bg-neutral-900 w-full
    font-bold border rounded-xl
    text-xl cursor-pointer
    ">
            <span>Menu</span>
        </div>
    </div>

    <div class="section-menu absolute bg-neutral-900 xl:static xl:self-start z-100 w-full xl:max-w-96 p-4">
        <div class="flex flex-col w-full rounded-xl border border-purple-400 xl:flex p-2 gap-2 h-auto z-999">
            <?php
            foreach ($this->getComponents() as $component) {
                $component->render();
            }
            ?>
        </div>
    </div>
</div>