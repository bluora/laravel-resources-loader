<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class JqueryUi
{
    /**
     * Load jQuery UI.
     *
     * @param bool $version
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct($version = false)
    {
        Resource::container('Jquery');
        $theme = (empty($theme)) ? Config::get('resources.version.JqueryUiTheme') : $theme;

        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery-ui.min.js');
            Resource::add('vendor/themes/'.$theme.'/jquery-ui.min.css');

            return;
        }

        $version = Resource::version(class_basename(__CLASS__), $version);
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/jquery-ui.min.js');
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/themes/'.$theme.'/jquery-ui.min.css');
    }
}
