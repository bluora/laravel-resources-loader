<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Config;
use Resource as Res;

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
            Res::add('vendor/jquery/jquery.min.js', 'header');

            return;
        }

        $version = Res::version('Jquery', $version);
        Res::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js', 'header');
    }
}
