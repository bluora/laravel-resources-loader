<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class FlotTooltip
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery.flot.tooltip.min.js');
        } else {
            $version = Resource::version('Flottooltip', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/flot.tooltip/'.$version.'/jquery.flot.tooltip.min.js');
        }
    }
}
