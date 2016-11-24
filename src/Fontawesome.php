<?php

namespace Bluora\LaravelResourcesLoader;

use Config;
use Resource as Res;

class Fontawesome
{
    /**
     * Load FontAwesome.
     *
     * @param boolean $version
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Res::add('vendor/font-awesome/css/font-awesome.min.css');

            return;
        }

        $version = (empty($version)) ? Config::get('resources.version.Fontawesome') : $version;
        Res::add('https://maxcdn.bootstrapcdn.com/font-awesome/'.$version.'/css/font-awesome.min.css');
    }
}
