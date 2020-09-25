<?php

declare(strict_types=1);

namespace App\View\Cell;

use Cake\Utility\Text;
use Cake\View\Cell;

/**
 * Menus cell
 */
class MenusCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    public function display(): array
    {
    }
    /**
     * Default display method.
     *
     * @return void
     */
    public function items($target = 'admin', $template = null)
    {
        if (!isset($this->Items)) {
            $this->loadModel('Items');
        }

        $items = $this->Items->findTreeByMenu($target)->select(['Items.id', 'Items.parent_id', 'Items.slug', 'Items.title', 'Items.model', 'Items.url','Items.attrs'])->toArray();
        $items = $this->Items->toTree($items, function ($item) {
            return $item;
        });

        if ($template) {
            $this->viewBuilder()->setTemplate($template);
        }

        $this->set('items', $items);
    }
}
