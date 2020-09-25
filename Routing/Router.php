<?php

namespace Appearances\Routing;

use Cake\Routing\Router as BaseRouter;

class Router extends BaseRouter
{

    public static function url($url = null, bool $full = false): string
    {
        if (empty($url) || $url == '#') {
            return '#';
        }

        if (is_string($url)) {
            $args = null;
            if (preg_match_all('/(plugin|controller|action|prefix|[a-z]+)\:([\w\-]+)/', $url, $args)) {

                $urlParams = parse_url($url);
                $urlParams += ['query' => null];

                $url = self::combine($args, 1, 2);
                $url += ['plugin' => false, 'prefix' => false];
                if (preg_match_all('/([a-z]+)\=([\w\-]+)/', $urlParams['query'], $queryArgs)) {
                    $query = self::combine($queryArgs, 1, 2);
                    if ($query) {
                        $url['?'] = $query;
                    }
                }
                unset($args);


            }
        }
 
        $url = parent::url($url, $full);
  
        return $url;
    }

    protected static function combine($rows, $k, $v)
    {
        $rows = array_combine($rows[$k], $rows[$v]);
        return array_filter($rows, function ($row) {
            return !empty($row);
        });
    }
