<?php

namespace Bluora\LaravelResourcesLoader;

use Config;

class Fontawesome
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/font-awesome/css/font-awesome.min.css');

            return;
        }

        $version = (empty($version)) ? Config::get('resources.version.Fontawesome') : $version;
        Resource::add('https://maxcdn.bootstrapcdn.com/font-awesome/'.$version.'/css/font-awesome.min.css');
    }
}
