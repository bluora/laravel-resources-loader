<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class Ladda
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/ladda.spin.min.js');
            Resource::add('vendor/ladda.min.js');
            Resource::add('vendor/ladda.jquery.min.js');
            Resource::add('vendor/ladda-themeless.min.css');
        } else {
            $version = Resource::version('Ladda', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/Ladda/'.$version.'/spin.min.js');
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/Ladda/'.$version.'/ladda.min.js');
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/Ladda/'.$version.'/ladda.jquery.min.js');
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/Ladda/'.$version.'/ladda-themeless.min.css');
        }
        Resource::container('Jquery');
    }
}
