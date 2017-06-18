<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class FlagIcon
{
    public static function svg($country_code, $version = false)
    {
        $version = Resource::version('Flagicon', $version);

        return 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/'.$version.'/flags/1x1/'.strtolower($country_code).'.svg';
    }
}
