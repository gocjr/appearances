<?php
$text = __('Down');
$url->move[1] = 'down';
?>
<a href="<?= $this->Url->build($url->move) ?>" role="button" title="<?= $text ?>" class="text-secondary"><i class="fa fa-arrow-down"></i> <span><?= $text ?></span></a>