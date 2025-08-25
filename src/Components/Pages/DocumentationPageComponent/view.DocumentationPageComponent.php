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
    <div class="w-full p-4 pr-4 md:pr-24 lg:pr-36 xl:pr-48">
        <?php
        $this->getMarkdownComponent()?->render();
        ?>
    </div>
</div>