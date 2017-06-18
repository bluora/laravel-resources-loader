<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class IcheckInput
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/icheck.min.js');
        } else {
            $version = Resource::version('Icheck', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/iCheck/'.$version.'/icheck.min.js');
        }
    }

    public static function skin($skin, $colour)
    {
        if (!empty($skin) && !empty($colour)) {
            if (!env('APP_CDN', true)) {
                Resource::add('vendor/icheck/skins/'.$skin.'/'.$colour.'.css');
            } else {
                $version = Resource::version('Icheck');
                Resource::add('https://cdnjs.cloudflare.com/ajax/libs/iCheck/'.$version.'/skins/'.$skin.'/'.$colour.'.css');
            }
        }
    }
}
