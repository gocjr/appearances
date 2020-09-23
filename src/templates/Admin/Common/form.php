<?php
$colLeft = [
    'title' => ['type'=>'text'],
    'slug' => ['type'=>'text'],
];
$this->set(compact('colLeft'));
$this->extend('Appearances.Admin/Common/form');
