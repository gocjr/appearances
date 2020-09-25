<?php
$tbody = $this->fetch('tbody');
$thead = $this->fetch('thead');

$searchOptions = [
    'placeholder' => __('Search'),
    'label' => false,
    'submit' => ['title' => __('Search'), 'icon' => 'search', 'class' => 'btn btn-sm btn-primary'],
    'reset' => ['title' => __('Clean'), 'icon' => 'times-circle', 'class' => 'btn btn-sm btn-warning']
];
// flex-sm-column flex-sm-row-reverse flex-md-row flex-lg-row
?>
<?= $this->Html->script(['app'], ['block' => 'script']) ?>
<?= $this->Form->create($entity) ?>
<?= $this->Form->text('ac', ['readonly' => true, 'style' => 'display:none;']) ?>


<!--actions-->
<div class="d-flex flex-column flex-column-reverse flex-sm-row bd-highlight">
    <div class="mb-2 flex-fill">
        <?= $this->fetch('actions'); ?>
    </div>
    <div class="mb-2 flex-fill">
        <?= $this->Form->search('search', $searchOptions) ?>
    </div>
</div>

<!--custom-->
<?= $this->fetch('custom'); ?>

<!--table-->
<th scope="col" class="text-center" style="width:4%"><?= $this->Form->checkbox('checkall') ?></th>
<?php echo $thead; ?>

<?php foreach ($rows as $i => $row) : ?>

<?php endforeach; ?>

<?= $this->Form->end() ?>

<!--pagination-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-0">
    <div class="btn-toolbar mb-2 mb-md-0">
        <ul class="pagination pagination-sm 0">
            <?= $this->Paginator->first('« ' . __('first')) ?>
            <?= $this->Paginator->prev('‹ ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' ›') ?>
            <?= $this->Paginator->last(__('last') . ' »') ?>
        </ul>
    </div>
    <h1 class="h6 small">
        <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </h1>
</div>