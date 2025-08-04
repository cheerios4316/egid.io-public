<?php

namespace Src\Components\Pages\MainPageComponent;

/**
 * @var MainPageComponent $this
 */

?>

<div class="main-page-component text-neutral-200 py-8">
    <div class="px-8 text-center">
        <p>This website was built using the Dumpsterfire framework.
            <?= $this->getSourceCodeLinkComponent()->content() ?>!
        </p>
        <p></p>
    </div>

    <?php
    $this->generateDivider("who am i")->render()
        ?>


    <div class="px-8 flex flex-col md:flex-row gap-8 justify-evenly">
        <div class="flex flex-col gap-2 w-full md:w-1/2 pr-8 text-justify">
            <p>
                I am a <?= $this->getYearsOld() ?> years old web developer from Italy 🇮🇹, currently based in Pisa.
            </p>
            <p>
                I'm strongly focused on PHP but I have experience with a wide range of languages and technologies.</p>
            <p>
                I have a Technical High School Diploma in Computer Science and I've worked in the field for 3 years now.
            </p>
            <p>
                My hobbies – aside from coding – include playing music, cooking good food, and playing old PC games.</p>
            <p>
                Here I attached a couple of pictures of two crafts I'm really proud of 🥘
            </p>
        </div>
        <div class="flex gap-4 w-full md:w-1/2">
            <img class="w-full h-60 rounded object-cover" src="/public/img/food/pane.png" alt="Bread">
            <img class="w-full h-60 rounded object-cover" src="/public/img/food/pasta-patane.png"
                alt="Pasta, potatoes and provola">
        </div>
    </div>

    <?php
    $this->generateDivider("check out my work")->render()
        ?>
    <div class="flex w-full flex-col md:flex-row items-center md:items-start md:justify-evenly gap-4 px-8">
        <?php
        foreach ($this->getImageCtaComponents() as $component) {
            $component->render();
        }
        ?>
    </div>
</div>