<?php

namespace ResourcesLoader;

use Resource;

class Jquery
{
    public function __construct()
    {
        Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    }
}
