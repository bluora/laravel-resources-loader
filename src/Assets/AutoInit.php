<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class AutoInit
{
    public function __construct()
    {
        Resource::add('vendor/jquery.autoinit.js');
        Resource::add('vendor/jquery.autoinit-extensions.js');
    }
}
