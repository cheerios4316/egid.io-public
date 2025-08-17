<?php

namespace Src\Components\Pages\DocumentationPageComponent;

use DumpsterfirePages\Container\Container;
use Src\Components\MarkDownComponent\MarkDownComponent;

/**
 * @var DocumentationPageComponent $this;
 */

?>

<div class="documentation-page-component overflow-hidden flex flex-col md:flex-row">
    <?php $this->getSidebarComponent()->render(); ?>
    <div class="w-full">
        <?php
        $this->getMarkdownComponent()?->render();
        ?>
    </div>
</div>