<?php

namespace Src\Components\Pages\MainPageComponent;

/**
 * @var MainPageComponent $this
 */

?>

<div class="main-page-component text-purple-200 py-8">
    <div class="px-8 text-center">
        <p>This website was built using the Dumpsterfire framework. <?= $this->getSourceCodeLinkComponent()->content() ?>!</p>
        <p></p>
    </div>

    <?php
    $this->generateDivider("who am i")->render()
    ?>

    <p class="px-8">
        I am a <?= $this->getYearsOld() ?> years old web developer from Italy 🇮🇹, currently based in Pisa. <br>
        I'm strongly focused on PHP but I have experience with a wide range of languages and technologies. <br>

    </p>

    <?php
    $this->generateDivider("check out my work")->render()
    ?>
    <div class="flex w-full flex-col md:flex-row items-center md:items-start md:justify-evenly gap-4 px-8">
        <?php 
        foreach($this->getImageCtaComponents() as $component) {
            $component->render();
        }
        ?>
    </div>
</div>