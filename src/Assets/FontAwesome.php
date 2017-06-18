<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource as Res;

class FontAwesome
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

        $version = Res::version('FontAwesome', $version);
        Res::add('https://maxcdn.bootstrapcdn.com/font-awesome/'.$version.'/css/font-awesome.min.css');
    }
}
