<?php

use App\View\Helper\Bootstrap4\HtmlHelper;
?>

<!--sidebar-->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="sb_admin_sidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Items -->
    <?php
    $itemHtml = '';
    foreach ($items as $item) :
        $item['attrs'] = $item['attrs'] ?? [];
        $item['attrs']['class'] = 'nav-link';
        $active = $this->Html->isActived($item['url']) ? ' active' : '';

        if (!empty($item['children'])) :
            $domId = 'collapse' . $this->Text->slug($item['slug']);
            $item['attrs']['class'] = $item['attrs']['class'] . ' collapsed';
            $item['attrs'] += ['data-toggle' => "collapse", 'aria-expanded' => "true", 'aria-controls'];

            echo '<li class="nav-item' .  $active . '">';
            echo $this->Html->link($item['title'], '#' . $domId, $item['attrs']);
            echo '<div id="' . $domId . '" class="collapse" aria-labelledby="heading' . $domId . '" data-parent="#sb_admin_sidebar">';
            echo '<div class="bg-white py-2 collapse-inner rounded">';

            foreach ($item['children'] as $child) :
                $child['attrs'] = $child['attrs'] ?? [];
                $child['attrs']['class'] = 'collapse-item';
                $child['attrs'] += ['isActived' =>  $this->Html->isActived($child['url']), 'divisor' => null];

                $link = $this->Html->link($child['title'], $child['url'], $child['attrs']);
                switch ($child['attrs']['divisor']) {
                    case 'before':
                        echo '<hr class="p-0 m-2">' . $link;
                        break;
                    case 'after':
                        echo $link . '<hr class="p-0 m-2">';
                        break;
                    default:
                        echo $link;
                        break;
                }
            endforeach;
            echo '</div></div>';
            echo '</li>';
        else :
            echo '<li class="nav-item' .  $active . '">';
            echo $this->Html->link($item['title'], $item['url'], $item['attrs']);
            echo '</li>';
        endif;

    endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>