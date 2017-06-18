<?php

use Bluora\LaravelResourcesLoader\Resource;

function hookAddClassHtmlTag($class_name)
{
    $container = studly_case(str_replace(['auto-init-', '-'], ['', '_'], $class_name));
    Resource::container($container);
}
