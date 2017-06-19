<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class FontAwesome
{
    /**
     * Load FontAwesome.
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
            Resource::add('vendor/font-awesome/css/font-awesome.min.css');

            return;
        }

        $version = Resource::version(class_basename(__CLASS__), $version);
        Resource::add('https://maxcdn.bootstrapcdn.com/font-awesome/'.$version.'/css/font-awesome.min.css');
    }
}
