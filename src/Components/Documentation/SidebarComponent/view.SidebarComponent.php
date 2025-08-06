<?php

namespace Src\Components\Documentation\SidebarComponent;

/**
 * @var SidebarComponent $this;
 */

?>

<div class="sidebar-component h-full flex flex-col w-1/4 border-r border-purple-400">
    <?php
    foreach($this->getComponents() as $component) {
        $component->render();
    }
    ?>
</div>