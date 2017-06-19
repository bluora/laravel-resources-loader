<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class AutoInit
{
    public function __construct()
    {
        Resource::add('vendor/autoinit.js');
        Resource::add('vendor/autoinit-extensions.js');
    }
}
