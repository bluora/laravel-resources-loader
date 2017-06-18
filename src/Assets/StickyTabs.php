<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class StickyTabs
{
    public function __construct($version = false)
    {
        Resource::add('vendor/jquery.sticky.bootstrap.tabs.js');
    }
}
