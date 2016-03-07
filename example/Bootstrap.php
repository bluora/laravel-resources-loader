<?php

namespace App\Assets;

class Bootstrap
{
    public function __construct()
    {
        Resource::container('Jquery');
        Resource::add('js/bootstrap.js');
        Resource::add('css/bootstrap.css');
    }
}
