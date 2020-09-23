<?php
$this->extend('Appearances.Admin/Common/index');
?>

<?php $this->start('thread'); ?>
<td><?= $this->Paginator->sort('id') ?></td>
<td><?= $this->Paginator->sort('title') ?></td>
<td><?= $this->Paginator->sort('created') ?></td>
<td><?= $this->Paginator->sort('modified') ?></td>
<?php $this->end('thread'); ?>

<?php $this->start('tbody'); ?>
<td>{{ $row->id }}</td>
<td>{{ $row->title.$this->Html->small($row->title,['class'=>'d-block']) }}</td>
<td>{{ $row->created}}</td>
<td>{{ $row->modified}}</td>
<?php $this->end('tbody'); ?>