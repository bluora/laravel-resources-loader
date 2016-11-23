<?php

namespace Bluora\LaravelResourcesLoader;

use Config;

class Jqueryui
{
    public function __construct($version = false)
    {
        Resource::container('Jquery');
        $theme = (empty($theme)) ? Config::get('resources.version.JqueryUiTheme') : $theme;

        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery-ui/jquery-ui.min.js');
            Resource::add('vendor/jquery-ui/themes/'.$theme.'/jquery-ui.min.css');

            return;
        }

        $version = (empty($version)) ? Config::get('resources.version.JqueryUi') : $version;
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/jquery-ui.min.js');
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/themes/'.$theme.'/jquery-ui.min.css');
    }
}
