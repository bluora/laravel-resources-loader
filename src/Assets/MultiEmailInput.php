<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class MultiEmailInput
{
    public function __construct($version = false)
    {
        Resource::container('BootstrapTagsInput');
        Resource::add('vendor/multi-email.js');
        Resource::add('vendor/multi-email.css');
    }
}
