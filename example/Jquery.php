<?php

namespace App\Assets;

class Jquery
{
    public function __construct()
    {
       Resource::addFirst('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    }
}
