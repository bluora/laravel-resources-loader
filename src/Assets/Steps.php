<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class Steps
{
    public function __construct($version = false)
    {
        Resource::container('Jquery');
        Resource::container('Validate');

        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery.steps.min.js');
            Resource::add('vendor/jquery.steps.css');
        } else {
            $version = Resource::version('Steps', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/'.$version.'/jquery.steps.min.js');
            Resource::add('vendor/jquery.steps/jquery.steps.css');
        }
    }
}
