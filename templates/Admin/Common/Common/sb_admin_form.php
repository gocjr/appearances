<?php
$this->Html->script('/vendor/gocjr/jquery.slugable', ['block' => 'script']);
$this->Html->script('/vendor/gocjr/title-autofill-slug', ['block' => 'script']);

echo $this->Form->create($row);
?>

<div class="card shadow py-0">
    <!--actions-->
    <div class="card-header btn-group-sm p-2 px-sm-3">
        <?php
        if ($this->exists('before.actions')) {
            echo $this->fetch('before.actions') . ' | ';
        }

        echo $this->element('bootstrap4/btn/save') . ' ';
        echo $this->element('bootstrap4/btn/apply') . ' ';
        echo $this->element('bootstrap4/btn/cancel');

        if ($this->exists('after.actions')) {
            echo $this->fetch('after.actions');
        }

        ?>
    </div>
    <!--fields-->
    <div class="card-body">
        <div class="form-row">
            <?php if (isset($colLeft) && isset($colRight)) : ?>
                <div class="col-8">
                    <?= $this->Form->controls($colLeft, ['fieldset' => false]); ?>
                </div>
                <div class="col-4">
                    <?= $this->Form->controls($colRight, ['fieldset' => false]); ?>
                </div>
            <?php elseif (isset($colLeft)) : ?>
                <div class="col-12">
                    <?= $this->Form->controls($colLeft, ['fieldset' => false]); ?>
                </div>
            <?php elseif (isset($colRight)) : ?>
                <div class="col-12">
                    <?= $this->Form->controls($colRight, ['fieldset' => false]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>
<!--custom-->
<?= $this->fetch('custom'); ?>