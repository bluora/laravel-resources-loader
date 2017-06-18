<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class TimePickerInput
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery.timepicker.css');
            Resource::add('vendor/jquery.timepicker.js');
        } else {
            $version = Resource::version('TimePicker', $version);
            Resource::add('https://cdn.jsdelivr.net/jquery.timepicker/'.$version.'/jquery.timepicker.css');
            Resource::add('https://cdn.jsdelivr.net/jquery.timepicker/'.$version.'/jquery.timepicker.min.js');
        }
    }
}
