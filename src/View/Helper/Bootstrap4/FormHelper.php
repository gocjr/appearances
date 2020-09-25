<?php

namespace App\View\Helper\Bootstrap4;

use Cake\Utility\Text;
use Cake\View\Helper\FormHelper as BaseFormHelper;
use Cake\View\View;

//
class FormHelper extends BaseFormHelper
{
    public function __construct(View $view, array $config = [])
    {
        $config['errorClass'] = 'is-invalid';
        parent::__construct($view, $config);
    }

    public function icon(string $name = null): string
    {
        return $this->formatTemplate('icon', compact('name'));
    }

    public function control(string $fieldName, array $options = []): string
    {
        $options += [
            'id' => strtolower(Text::slug($fieldName, '_')),
            'type' => null,
            'class' => 'form-control form-control-sm',
            'label' => null,
            'button' => [],
            'multiple' => null,
            'options' => null
        ];

        $type = $options['type'];
        $isMultiple = null;
        if ($options['multiple']) {
            $type = $options['multiple'];
            $isMultiple = true;
        }

        if (method_exists($options['options'], 'toArray')) {
            $options['options'] = $options['options']->toArray();
        }

        switch ($type) {
            case 'checkbox':
                $options['class'] = 'form-check-input';
                $options['templates']['multicheckboxTitle'] = '<legend>{{text}}</legend>';
                $options['templates']['checkboxWrapper'] = '<div class="form-check my-0 py-0 ">{{label}}</div>';
                $options['labelOptions'] = ['class' => 'p-0 m-0'];
                break;
            case 'checkbox-inline':
                $label = $this->label($options['label'] ?? $fieldName);
                $options['label'] = false;
                $options['class'] = 'form-check-input';
                $options['multiple'] = 'checkbox';
                $options['templates']['multicheckboxTitle'] = '<label class="font-weight-bold">{{text}}</label>';
                $options['templates']['multicheckboxWrapper'] = '<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">{{content}}</div>';

                $options['templates']['checkboxWrapper'] = '<div class="form-check mr-3">{{label}}</div>';
                $options['templates']['inputContainer'] = '<div class="form-group {{type}}{{required}}">' . $label . '<div class="form-row px-2 py-1 m-0 border rounded">{{content}}</div></div>';
                $options['templates']['inputContainerError'] = '<div class="form-group {{type}}{{required}} error">' . $label . '<div class="form-row px-2 py-1 m-0 border rounded">{{content}}{{error}}</div></div>';
                $options['labelOptions'] = ['class' => 'p-0 m-0'];
                break;
            case 'dropdown-select':
                //attributes
                $options['autocomplete'] = 'off';
                $options['aria-expanded='] = 'false';
                $options['aria-haspopup'] = 'true';
                $options['data-toggle'] = 'dropdown';
                $options['class'] = 'form-control form-control-sm dropdown-toggle';
                $options['type'] = 'text';

                $dropdownItems = '';
                foreach ($options['options'] as $value => $text) {
                    $dropdownItems .= $this->button('<i class="fas fa-' . $value . '"></i> ' . $text,  ['type' => 'button', 'escapeTitle' => false, 'class' => "dropdown-item rounded-0", 'data-value' => $value]);
                }

                //templates
                $options['templates']['inputContainer'] = '<div class="form-group dropdown {{type}}{{required}}">{{content}}{{dropdown}}</div>';
                $options['templates']['inputContainerError'] = '<div class="form-group {{type}}{{required}} text-danger">{{content}}{{error}}{{dropdown}}"</div>';
                $options['templateVars']['dropdown'] = '<div class="dropdown-menu w-100 overflow-auto" aria-labelledby="' . $options['id'] . '" style="height:150px;">' . $dropdownItems . '</div>';

                unset($options['options'], $options['button']);
                break;
            case 'search':
                $options['class'] = 'form-control';
                break;
        }

        return parent::control($fieldName, $options);
    }

    public function search($fieldName, $options = [])
    {
        $options += [
            'type' => 'text',
            'class' => 'form-control',
            'label' => null,
            'button' => [],
        ];

        $button = '';
        if ($options['button']) {
            $options['button'] += ['type' => 'button', 'class' => 'btn btn-info', 'title' => 'serach'];
            if (isset($options['button']['icon'])) {
                $options['button']['escapeTitle'] = false;
                $options['button']['title'] =  $this->icon($options['button']['icon']) . ' ' . $options['button']['title'];
            }

            $button = '<div class="input-group-append">';
            $button .= $this->button($options['button']['title'], $options['button']);
            $button .= '</div>';
        }
        $options['placeholder'] = $fieldName;

        unset($options['button'], $options['icon']);

        return  '<div class="input-group input-group-sm">' . parent::search($fieldName, $options) .  $button . '</div>';
    }

    public function multiCheckbox(string $fieldName, iterable $options, array $attributes = []): string
    {
        return parent::multiCheckbox($fieldName, $options, $attributes);
    }

    public function checkbox(string $fieldName, array $options = [])
    {
        return parent::checkbox($fieldName, $options);
    }
}
