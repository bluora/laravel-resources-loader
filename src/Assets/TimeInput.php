<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class TimeInput
{
    public function __construct()
    {
        Resource::add('vendor/wickedpicker.css');
        Resource::add('vendor/wickedpicker.js');
    }
}
