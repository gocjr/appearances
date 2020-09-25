<?php
$searchText =  __('Search for...');
$btnClean = 'btn-primary';
$inputSearch = 'bg-light border-0 small';
$focus = '';
if ($search) {
    $btnClean = 'btn-light text-primary active';
    $inputSearch = 'bg-light border-0 text-primary font-weight-bold';
    $focus = ' border border-primary border-bottom-5 rounded font-weight-bold shadow-sm text-primary';
}
?>
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get">
    <div class="input-group <?= $focus?>">
        <input type="text" class="form-control <?= $inputSearch ?>" name="q" value="<?= $search ?>" placeholder="<?= $searchText  ?>" aria-label="<?= $searchText  ?>" aria-describedby="button-addon1">
        <div class="input-group-append">
            <?php if ($search) :  unset($url->index['?']['q'])?>
                <a href="<?= $this->Url->build($url->index) ?>" type="search" class="btn btn-link bg-light" role="button" id="button-addon1" title="<?= __('Clean search') ?>"><i class="fa fa-times-circle"></i></a>
            <?php endif; ?>
            <button class="btn <?= $btnClean ?>" type="submit" id="button-addon1" title="<?= $searchText ?>"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>