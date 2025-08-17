<?php

namespace Src\Components\Documentation\SidebarComponent;

/**
 * @var SidebarComponent $this ;
 */

?>

<div class="sidebar-component flex flex-col md:contents relative md:static w-full md:w-96">
    <div class="menu-button text-neutral-800 md:hidden p-4 bg-gradient-to-r w-full font-bold from-purple-400 to-transparent text-xl cursor-pointer">
        <span>Menu</span>
    </div>
    <div class="section-menu absolute md:static z-100 w-full md:w-96 top-full">
        <div class="flex flex-col w-full border-purple-400 md:flex">
            <?php
            foreach ($this->getComponents() as $component) {
                $component->render();
            }
            ?>
        </div>
    </div>
</div>