<?php

namespace ResourcesLoader;

class Fontawesome
{
    public function __construct($version = false)
    {
        $version = (empty($version)) ? '4.6.3' : $version;
        Resource::add('https://maxcdn.bootstrapcdn.com/font-awesome/'.$version.'/css/font-awesome.min.css');
    }
}
