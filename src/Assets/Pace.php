<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class Pace
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/pace.min.js');
        } else {
            $version = Resource::version('Pace', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/pace/'.$version.'/pace.min.js');
        }
    }
}
