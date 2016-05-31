<?php

namespace ResourcesLoader;

class Jquery
{
    public function __construct($version = false)
    {
        $version = (empty($version)) ? '2.2.4' : $version;
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js');
    }
}
