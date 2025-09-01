<?php

namespace Src\Components\Pages\DocumentationPageComponent;

use DumpsterfirePages\Container\Container;
use Src\Components\MarkDownComponent\MarkDownComponent;

/**
 * @var DocumentationPageComponent $this;
 */

?>

<div class="documentation-page-component flex flex-col xl:flex-row">
    <?php $this->getSidebarComponent()->render(); ?>
    <div class="w-full p-4 pr-4">
        <?php
        $this->getMarkdownComponent()?->render();
        ?>
    </div>
</div>