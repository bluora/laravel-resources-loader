<?php

namespace Bluora\LaravelResourcesLoader\Assets;

use Resource;

class DropZoneInput
{
    public function __construct($version = false)
    {
        if (!env('APP_CDN', true)) {
            Resource::add('vendor/dropzone.js');
            Resource::add('vendor/dropzone.css');
        } else {
            $version = Resource::version('DropZone', $version);
            Resource::add('https://cdnjs.cloudflare.com/ajax/libs/dropzone/'.$version.'/min/dropzone.min.js');
            Resource::add('vendor/dropzone/dropzone.css');
        }

        Resource::addScript('if (typeof Dropzone != \'undefined\') { Dropzone.autoDiscover = false; }');
    }

    public static function options($options = [])
    {
        $default = [
            'dictDefaultMessage'     => '',
            'dictDefaultMessageHint' => '<u>Drop</u> files here or <u>click</u> to browse.',
        ];
        $options = array_merge($default, $options);
        if (!empty($options['dictDefaultMessageHint'])) {
            if (!empty($options['dictDefaultMessage'])) {
                $options['dictDefaultMessage'] .= '<br>';
                $options['dictDefaultMessageHint'] = str_replace(['Drop', 'click'], ['dropping', 'clicking'], $options['dictDefaultMessageHint']);
            }
            $options['dictDefaultMessage'] .= $options['dictDefaultMessageHint'];
        }

        return htmlspecialchars(json_encode($options));
    }
}
