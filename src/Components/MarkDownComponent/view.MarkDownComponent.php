<?php

use Src\Components\MarkDownComponent\MarkDownComponent;

/**
 * @var MarkDownComponent $this ;
 */

?>

<div class="mark-down-component text-neutral-200 text-md p-8 gap-2 md:border border-purple-400 rounded-xl">
    <?php
    try {
        echo $this->getMarkdown();
    } catch (Throwable $e) {
        echo "";
    }
    ?>
</div>
