<?php if (!empty($filter)) : ?>
    <div class="dropdown d-inline">
        <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cogs"></i> <?= __('Filter') ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($filters as $filter) : ?>
                <a class="dropdown-item" href="#">Action</a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>