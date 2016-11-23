<?php

namespace Bluora\LaravelResourcesLoader;

use Config;

class Jquery
{
    /**
     * Load jQuery.
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
            Resource::add('vendor/jquery/jquery.min.js');

            return;
        }

        $version = (empty($version)) ? Config::get('resources.version.Jquery') : $version;
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js');
    }
}
