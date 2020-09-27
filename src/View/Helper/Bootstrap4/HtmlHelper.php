<?php

namespace Appearances\View\Helper\Bootstrap4;

use Cake\View\Helper\HtmlHelper as BaseHtmlHelper;

class HtmlHelper extends BaseHtmlHelper
{
    protected $_regexUrlSelected = null;

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $request = $this->getView()->getRequest();
        $this->_regexUrlSelected = preg_replace('/\/' . $request->getParam('action') . '.*/', '', $request->getRequestTarget());
        $this->_regexUrlSelected = '/' . addcslashes($this->_regexUrlSelected, '/') . '/';
    }

    public function icon(string $name = null): string
    {
        $name = 'fas fa-' . $name;
        return $this->formatTemplate('icon', ['class'=>$name]);
    }

    public function isActived(&$url = null, string $regex = null)
    {

        $url = $this->Url->build($url);
        $regex = $regex ?? $this->_regexUrlSelected;
        return preg_match($regex, $url);
    }
    public function link($title, $url = null, array $options = []): string
    {

        $options += [
            'icon' => null,
            'class' => null,
            'beforeText' => null,
            'afterText' => null,
            'isActived' => false
        ];

        if ($options['isActived']) {
            $options['class'] = $options['class'] . ' active';
        }

        $textOptions = ['class' => 'd-block'];
        if ($options['icon']) {
            $options['icon'] = $this->icon($options['icon']) . ' ';
            $textOptions['class'] .= ' ml-3';
        }

        if ($options['beforeText']) {
            $options['beforeText'] = $this->small($options['beforeText'], $textOptions);
        }

        if ($options['afterText']) {
            $options['afterText'] = $this->small($options['afterText'], $textOptions);
        }

        if ($options['icon'] || $options['beforeText'] || $options['afterText']) {
            $options['escapeTitle'] = false;
            $title =  $options['icon'] . '<span class="text">' . $options['beforeText'] . $title . $options['afterText'] . '</span>';
        }

        unset($options['icon'], $options['beforeText'], $options['afterText'], $options['isActived']);

        return parent::link($title, $url, $options);
    }

    public function small(string $title, array $options = []): string
    {
        return $this->formatTemplate('small', [
            'text' => $title,
            'attrs' => $this->templater()->formatAttributes($options)
        ]);
    }

    public function accordion(string $name = 'accordion', array $items = [], array $options = []): string
    {
        $options += ['class' => 'nav flex-column', 'id' => $name, 'item' => ['class' => 'nav-link']];
        $itemDefault =  $options['item']['class'];
        $list = '<div ' . $this->templater()->formatAttributes($options) . '>';
        foreach ($items as $i => $item) {
            if (!empty($item['children'])) :
                $item['url'] = 'collapse' . rand();
                $options['item']['class'] = $itemDefault . ' dropdown-toggle';
                $list .= $this->link($item['title'], '#' . $item['url'],  $options['item'] + ['data-toggle' =>  'collapse']);
                $list .= $this->listGroup($item['children'], ['id' => $item['url']]);
            else :
                $options['item']['class'] = $itemDefault;
                $list .= $this->link($item['title'], $item['url'], $options['item']);
            endif;
        }
        $list .= '</div>';
        return  $list;
    }

    public function listGroup(array $items = [], array $options = []): string
    {
        $options += ['class' => 'list-group', 'item' => ['class' => 'list-group-item list-group-item-action']];
        $list = '<div ' . $this->templater()->formatAttributes($options, ['item']) . '>';
        foreach ($items as $i => $item) {
            $list .= $this->link($item['title'], $item['url'], $options['item']);
        }
        $list .= '</div>';
        return  $list;
    }


    public function sortable(array $rows = [], array $options = [], int $nivel = 0)
    {
        $options += [
            'class' => 'list-group list-group-flush  flex-column sortable p-0 rounded-0'
        ];
        $url = $this->getView()->getRequest()->getUri()->getPath();
        $html = '<ul ' . $this->templater()->formatAttributes($options) . '>';
        foreach ($rows as $row) {
            //$row->title = str_repeat('-', $nivel) . $row->title;
            $html .= '<li class="list-group-item py-1">';
            $html .= $this->link($row->title, $url, ['class' => 'p-0', 'data-row-id' => $row->id, 'data-row-parent' => $row->parent_id]);

            if ($row->children) {
                $html .= $this->sortable($row->children, $options, $nivel + 1);
            }
            $html .=  '</li>';
        }
        $html .= '</ul>';
        return  $html;
    }
}
