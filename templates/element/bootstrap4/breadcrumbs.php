<?php
if(isset($crumbs[0]['title'] )){
    $crumbs[0]['title'] = '<i class="fa fa-home"></i> '.$crumbs[0]['title'];
}

$crumbs = collection($crumbs)->map(function ($crumb) {
    $crumb['options']['class'] = 'breadcrumb-item p-1';
    return $crumb;
})->toArray();

echo  $this->Breadcrumbs->reset()->add($crumbs)->render([
    'class' => 'breadcrumb bg-transparent small m-0 p-0 d-inline-none'
    ]);