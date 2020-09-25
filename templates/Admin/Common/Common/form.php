<?php
$col  = '12';
if (!isset($url)) {
    $url = $crumbs[1]['url'];
}
?>

<?= $this->Form->create($row); ?>

<!--actions-->
<div class="actions btn-group btn-group-sm">
    <?= $this->element('Bootstrap4/btn/save'); ?>
    <?= $this->element('Bootstrap4/btn/apply'); ?>
    <?= $this->element('Bootstrap4/btn/cancel', ['url' => $url]); ?>
</div>

<!--custom-->
<?= $this->fetch('custom'); ?>

<!--fields-->
<div class="row mt-4">
    <?php if (isset($colLeft) && isset($colRight)) : ?>
        <div class="col-7">
            <?= $this->Form->controls($colLeft, ['fieldset' => false]); ?>
        </div>
        <div class="col-5">
            <?= $this->Form->controls($colRight, ['fieldset' => false]); ?>
        </div>
    <?php elseif (isset($colLeft)) : ?>
        <div class="col-12">
            <?= $this->Form->controls($colLeft, ['fieldset' => false]); ?>
        </div>
    <?php elseif (isset($colLeft)) : ?>
        <div class="col-12">
            <?= $this->Form->controls($colRight, ['fieldset' => false]); ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->Form->end(); ?>