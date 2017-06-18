<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class TimeInput
{
    public function __construct()
    {
        Resource::add('vendor/wickedpicker.css');
        Resource::add('vendor/wickedpicker.js');
    }
}
