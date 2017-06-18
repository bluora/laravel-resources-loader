<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class MultiEmailInput
{
    public function __construct($version = false)
    {
        Resource::container('BootstrapTagsInput');
        Resource::add('vendor/bootstrap-multi-email.js');
        Resource::add('vendor/bootstrap-multi-email.css');
    }
}
