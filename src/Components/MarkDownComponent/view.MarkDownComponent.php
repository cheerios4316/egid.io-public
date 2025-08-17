<?php

use Src\Components\MarkDownComponent\MarkDownComponent;

/**
 * @var MarkDownComponent $this ;
 */

?>

<div class="mark-down-component text-neutral-200 text-md p-8 gap-2">
    <?php
    try {
        echo $this->getMarkdown();
    } catch (Throwable $e) {
        echo "";
    }
    ?>
</div>
