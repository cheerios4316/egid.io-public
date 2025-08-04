<?php

namespace Src\Components\Pages\MainPageComponent;

/**
 * @var MainPageComponent $this
 */

?>

<div class="main-page-component text-purple-200">
    <div class="p-8 text-center">
        <p>this web page was built using the dumpsterfire framework. <?= $this->getSourceCodeLinkComponent()->content() ?>!</p>
        <p></p>
    </div>
    <?php
    $this->generateSectionDivisionComponent("contacts")->render()
    ?>
    <div class="flex w-full flex-col md:flex-row items-center md:items-start md:justify-evenly gap-4 px-8">
        <?php 
        foreach($this->getImageCtaComponents() as $component) {
            $component->render();
        }
        ?>
    </div>
</div>