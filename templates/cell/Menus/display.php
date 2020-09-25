<?php
use App\View\Helper\Bootstrap4\HtmlHelper;
?>
<!--sidebar-->
<ul class="nav nav-pills flex-column m-2 text-left" id="sidebar">
    <?php foreach ($items as $item) : ?>
        <li class="nav-item">
            <?php if (!empty($item['children'])) : $domId = 'collapse' . $item['slug'] ?>
                <?php echo $this->Html->link($item['title'], '#' . $domId, ['class' => "nav-link dropdown-toggle", 'data-toggle' => 'collapse']) ?>
                <div id="<?= $domId  ?>" class="collapse p-2  m-0 jumbotron" data-parent="#sidebar">
                    <div class="list-group list-group-flush rounded">
                        <?php
                        foreach ($item['children'] as $child) : $child['url'] = $this->Url->build($child['url']);
                            echo $this->Html->link($child['title'], $child['url'], ['class' => "nav-link py-1"]);
                        endforeach;
                        ?>
                    </div>
                </div>
            <?php else : ?>
                <?= $this->Html->link($item['title'], $item['url'], $item['attrs']) ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>