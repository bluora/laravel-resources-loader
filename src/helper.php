<?php

use Bluora\LaravelResourcesLoader\Resource;

function hookAddClassHtmlTag($class_name)
{
    if (strpos($class_name, 'auto-init-') !== false) {
        $container = studly_case(str_replace(['auto-init-', '-'], ['', '_'], $class_name));
        Resource::container($container);
    }
}
