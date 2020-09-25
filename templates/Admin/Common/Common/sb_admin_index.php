<?php
$this->Html->script(['/vendor/gocjr/jquery.checkall', '/vendor/gocjr/jquery.submit'], ['block' => 'script'])
?>

<?= $this->Form->create($form); ?>

<div class="card shadow py-0">
    <div class="card-header btn-group-sm p-2 px-sm-3">
        <?php
        if ($this->exists('before.actions')) {
            echo $this->fetch('before.actions') . ' | ';
        }
        echo $this->element('bootstrap4/btn/add') . ' ';
        echo $this->element('bootstrap4/btn/delete') . ' ';
        echo $this->element('bootstrap4/btn/limit');
        if ($this->exists('after.actions')) {
            echo $this->fetch('after.actions');
        }
        ?>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped p-0 m-0" width="100%" style="width: 100%;">
            <tread>
                <tr>
                    <th class=""><?= $this->Form->checkbox('checkall') ?></th>
                    <?= $this->fetch('thread'); ?>
                </tr>
            </tread>
            <tbody>
                <?php foreach ($rows as $i => $row) : ?>
                    <?php
                    $url->view[0] =  $row->id;
                    $url->edit[0] =  $row->id;
                    $url->move[0] =  $row->id;
                    ?>
                    <tr>
                        <td class=""><?= $this->Form->checkbox('check.' . $i, ['value' => $row->id, 'class' => 'child']) ?></td>
                        <?php eval('?>' . str_replace(['{{', '}}'], ['<?=', '?>'], $this->fetch('tbody')) . '<?php'); ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="card-footer px-3">
            <?= $this->element('bootstrap4/btn/paginate') ?>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>