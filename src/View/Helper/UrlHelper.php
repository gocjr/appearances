<?php

namespace Appearances\View\Helper;

use Appearances\Routing\Router;
use Cake\View\Helper\UrlHelper as BaseUrlHelper;

/**
 * Url helper
 * @property \Cake\Routing\Route\Route $Route;
 * @method \Cake\Routing\Route\Route
 */
class UrlHelper extends BaseUrlHelper
{

    public function build($url = null, array $options = []): string
    {
        return Router::url($url, $options['fullbase'] ?? false);
    }
}
