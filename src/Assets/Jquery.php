<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class Jquery
{
    /**
     * Load jQuery.
     *
     * @param bool $version
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery.min.js', 'header');

            return;
        }

        $version = Resource::version('Jquery', $version);
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js', 'header');
    }
}
