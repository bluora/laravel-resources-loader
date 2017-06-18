<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class Slimscroll
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery.slimscroll.min.js');
        } else {
            $version = Resource::version('Slimscroll', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/'.$version.'/jquery.slimscroll.min.js');
        }
        Resource::container('Jquery');
    }
}
