<div class="d-flex flex-column flex-sm-row justify-content-sm-between bd-highlight">
    <div class="bd-highlight">
        <ul class="pagination pagination-sm m-0 p-0 ">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
    <div class="bd-highlight small pt-1">
        <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>
</div>