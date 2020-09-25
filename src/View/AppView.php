<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 * 
 * @property \Cake\View\Helper\BreadcrumbsHelper $Breadcrumbs
 * @property \Cake\View\Helper\FlashHelper $Flash
 * @property \Cake\View\Helper\FormHelper $Form
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\NumberHelper $Number
 * @property \Cake\View\Helper\PaginatorHelper $Paginator
 * @property \Cake\View\Helper\TextHelper $Text
 * @property \Cake\View\Helper\TimeHelper $Time
 * @property \Cake\View\Helper\UrlHelper $Url
 * @property \Cake\View\ViewBlock $Blocks
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadHelper('Url', ['className' => 'Url']);
        $this->loadHelper('Html', ['className' => 'Bootstrap4/Html', 'templates' => 'templates/bootstrap4_html']);
        $this->loadHelper('Form', ['className' => 'Bootstrap4/Form', 'templates' => 'templates/bootstrap4_form']);
        $this->loadHelper('Flash', ['templates' => 'templates/bootstrap4_flash']);
        $this->loadHelper('Paginator', ['templates' => 'templates/paginator']);
        //  $this->loadHelper('Authentication.Identity');
    }

    public function printMustache(string $template = null, $data = []): string
    {
        $pattern = '/(?P<helper>\w+)::(?P<method>\w+)\(((?P<var>\w+).(?P<options>\{.*\}|\w+))\)/i';
        $data = $data->toArray();
        if (preg_match($pattern, $template, $args)) {
            $tmpl = current($args);
            $args = array_filter($args, function ($r) {
                return !is_numeric($r);
            }, ARRAY_FILTER_USE_KEY);
            $args += ['helper' => null, 'method' => null, 'var' => null, 'options' => false];

            if ($args['helper']) {
                $args['helper'] = $this->{$args['helper']};
            }

            if ($args['options']) {
                $args['options'] = json_decode($args['options'], true) ?? [];
            }

            if (isset($data[$args['var']])) {
                $args['var'] =  $data[$args['var']];
                $args['var'] =  $args['helper']->{$args['method']}($args['var'], $args['options']);
            }
            $template = str_replace($tmpl, $args['var'], $template);
        }

        $pattern = '#\{\{([\w\.\?]+)\}\}#';
        return preg_replace_callback($pattern, function ($i) use ($data) {
            $i = end($i);
            $def = '';
            if (strstr($i, '??') !== false) {
                list($i, $def) = explode('??', $i);
            }

            if (strstr($i, '.') !== false) {
                $keys = explode('.', $i);
                $rows = $data;
                foreach ($keys as $k) {
                    if (isset($rows[$k])) {
                        $rows = $rows[$k];
                    }
                }
                return is_array($rows) ? 'undefined' : $rows;
            }
            return !empty($data[$i]) ? $data[$i] : $def;
        }, $template);
    }


}
