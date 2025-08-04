<?php

namespace Src\Components\LinkComponent;

/**
 * @var LinkComponent $this
 */

?>

<a class="link-component text-purple-400 underline hover:no-underline" href="<?= $this->getHref() ?>" target="<?= $this->getTarget() ?: "" ?>">
    <?= $this->getText() ?>
</a>