<?php

use App\View\Helper\Bootstrap4\HtmlHelper;

$url->index['?']  = $this->request->getQuery() ?? [];
$url->index['?']['page'] = 1;
$url->index['?'] += [
    'limit' => 10
];

// Limits
$limits = [10, 25, 50, 100];
$limitsKey = (int) array_search($url->index['?']['limit'], $limits) ?? 0;
$limitClient = $limits[$limitsKey];
?>
<div class="dropdown d-inline">
    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= __('Show: <strong class="badge badge-warning">{0}</strong>', $limitClient) ?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php
        foreach ($limits as $i => $limit) :
            $options['class'] = 'dropdown-item';
            $options['regex'] = '/(limit=' . $limitClient . '$)/';
            $url->index['?']['limit'] = $limit;
            echo $this->Html->link($limit, $url->index, $options);
        endforeach;
        ?>
    </div>
</div>