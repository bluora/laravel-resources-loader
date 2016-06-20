<?php

namespace ResourcesLoader;

use Config;

class Jquery
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/jquery/jquery.min.js');
        } else {
            $version = (empty($version)) ? Config::get('resources.version.Jquery') : $version;
            Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js');
        }
    }
}
