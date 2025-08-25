<?php

namespace Src\Components\Documentation\SidebarComponent;

/**
 * @var SidebarComponent $this ;
 */

?>

<div class="sidebar-component flex flex-col md:contents relative md:static w-fullmd:px-0">
    <div class="px-4">
        <div class="mt-4
    menu-button text-purple-400
    md:hidden p-4 py-2 md:py-4
    bg-neutral-900 w-full
    font-bold border rounded-xl
    text-xl cursor-pointer
    ">
            <span>Menu</span>
        </div>
    </div>

    <div class="section-menu absolute bg-neutral-900 md:static md:self-start z-100 w-full md:min-w-48 lg:min-w-64 xl:min-w-96 md:max-w-96 p-4">
        <div class="flex flex-col w-full rounded-xl border border-purple-400 md:flex p-2 gap-2 h-auto z-999">
            <?php
            foreach ($this->getComponents() as $component) {
                $component->render();
            }
            ?>
        </div>
    </div>
</div>