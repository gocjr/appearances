<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\row[]|\Cake\Collection\CollectionInterface $rows
 */
$filters = [];


?>

<?= $this->Form->create($form); ?>
<div class="btn-group-sm px-2 pt-0 pb-2">
    <a class="btn btn-success" href="<?= $this->Url->build($url->add) ?>" role="button"><i class="fa fa-plus-circle"></i> <?= __('Add') ?></a>
    <button class="btn btn-danger" type="submit" name="ac"><i class="fa fa-trash"></i> <?= __('Delete') ?></button>
    <?= $this->element('bootstrap4/filter', compact('filters')) ?>
</div>
<div class="table-responsive">
    <table class="table table-striped border-bottom border-left border-right m-0 ">
        <thead>
            <tr>
                <th><?= $this->Form->checkbox('checkall') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('rule') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $this->Form->checkbox('check.' . $row->id, ['value' => $row->id]) ?></td>
                    <td><?= $this->Number->format($row->id) ?></td>
                    <td><?= h($row->rule) ?></td>
                    <td><?= h($row->username) ?></td>
                    <td><?= h($row->email) ?></td>
                    <td><?= h($row->created) ?></td>
                    <td><?= h($row->modified) ?></td>
                    <td><?= $this->Number->format($row->status) ?></td>
                    <td class="actions">
                        <a href="<?= $this->Url->build($url->view + [$row->id]) ?>" role="button"><i class="fa fa-info-circle"></i> <?= __('View') ?></a> |
                        <a href="<?= $this->Url->build($url->edit + [$row->id]) ?>" role="button"><i class="fa fa-plus-circle"></i> <?= __('Edit') ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->Form->end(); ?>
<div class="py-2">
    <?= $this->element('bootstrap4/paginate') ?>
</div>