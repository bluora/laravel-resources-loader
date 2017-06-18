<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class TagsInput
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/bootstrap.tagsinput.js');
            Resource::add('vendor/bootstrap.tagsinput.css');
        } else {
            $version = Resource::version('BootstrapTagsInput', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/'.$version.'/bootstrap-tagsinput.js');
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/'.$version.'/bootstrap-tagsinput.css');
        }
    }
}
