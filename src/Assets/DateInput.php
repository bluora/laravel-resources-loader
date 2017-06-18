<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class DateInput
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/bootstrap-datepicker.min.js');
            Resource::add('vendor/bootstrap-datepicker.css');
        } else {
            $version = Resource::version('Date', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/'.$version.'/js/bootstrap-datepicker.min.js');
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/'.$version.'/css/bootstrap-datepicker.css');
        }
    }
}