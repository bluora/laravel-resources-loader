<?php

namespace App\LaravelResourcesLoader\Assets;

use Resource;

class RedactorTextarea
{
    public function __construct()
    {
        Resource::add('vendor/jquery.redactor.js');
        Resource::add('vendor/jquery.redactor.css');
    }

    private static $plugins = [
        'alignment',
        'clips',
        'codemirror',
        'counter',
        'filemanager',
        'fontcolor',
        'fontfamily',
        'fontsize',
        'fullscreen',
        'imagemanager',
        'inlinestyle',
        'limiter',
        'properties',
        'source',
        'table',
        'textdirection',
        'textexpander',
        'video',
    ];

    public static function buttons($element, $buttons)
    {
        //@raw(echo "$('#investment-model-agreement-text').data('toolbar-buttons', ".json_encode(['format', 'bold', 'italic', 'deleted', 'lists', 'horizontalrule']).");")
        //

        $plugins = [];
        foreach ($buttons as $name) {
            self::loadPlugin($name, $plugins);
        }

        $html = sprintf("<script>$('%s').data('toolbar-buttons', %s);</script>", $element, json_encode($buttons));
        if (count($buttons)) {
            $html .= sprintf("<script>$('%s').data('toolbar-plugins', %s);</script>", $element, json_encode($plugins));
        }

        return $html;
    }

    public static function loadPlugin($plugin, &$plugins)
    {
        if (in_array($plugin, self::$plugins)) {
            $plugins[] = $plugin;
            Resource::add('vendor/jquery.redactor/'.$plugin.'.js');

            if ($plugin == 'alignment' || $plugin == 'clips') {
                Resource::add('vendor/jquery.redactor/'.$plugin.'.css');
            }
        }
    }
}
