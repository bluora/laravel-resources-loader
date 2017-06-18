<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Bluora\LaravelResourcesLoader\Resource;

class TextDiff
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/diff-match-patch.min.js');
            Resource::add('vendor/jquery.pretty-text-diff.min.js');
        } else {
            $version = Resource::version('DiffMatchPatch', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/diff_match_patch/'.$version.'/diff_match_patch.js');
            Resource::add('vendor/pretty-text-diff/jquery.pretty-text-diff.min.js');
        }
    }
}
