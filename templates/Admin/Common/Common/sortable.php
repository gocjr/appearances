<?php
echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', ['integrity' => "sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=", 'crossorigin' => "anonymous", 'block' => 'script']);
echo $this->Html->script('/vendor/gocjr/sortable', ['block' => 'script']);
echo $this->Html->sortable($rows);
