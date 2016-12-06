<?php

namespace Bluora\LaravelResourcesLoader;

use Config;
use Resource as Res;

class Jqueryui
{
    /**
     * Load jQuery UI.
     *
     * @param boolean $version
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct($version = false)
    {
        Res::container('Jquery');
        $theme = (empty($theme)) ? Config::get('resources.version.JqueryUiTheme') : $theme;

        if (!env('APP_CDN', true)) {
            Res::add('vendor/jquery-ui/jquery-ui.min.js');
            Res::add('vendor/jquery-ui/themes/'.$theme.'/jquery-ui.min.css');

            return;
        }

        $version = Res::version('JqueryUi', $version);
        Res::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/jquery-ui.min.js');
        Res::addFirst('https://ajax.googleapis.com/ajax/libs/jqueryui/'.$version.'/themes/'.$theme.'/jquery-ui.min.css');
    }
}
