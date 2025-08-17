<?php

namespace Src\Components\SectionDivisionComponent;

/**
 * @var SectionDivisionComponent $this
 */

?>

<div class="section-division-component monospace w-full flex justify-between gap-4 items-center my-4">
    <div class="w-full border-purple-700 border-b border-dashed h-1"></div>
    <h2 class="text-purple-400 text-2xl whitespace-nowrap"><?= $this->getText() ?></h2>
    <div class="w-full border-purple-700 border-b border-dashed h-1"></div>
</div>