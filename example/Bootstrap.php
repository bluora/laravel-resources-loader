<?php

namespace App\Assets;

use Resource;

class Bootstrap
{
    public function __construct()
    {
        Resource::container('Jquery');
        Resource::add('js/bootstrap.js');
        Resource::add('css/bootstrap.css');
    }
}
