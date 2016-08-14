<?php

return [
    'namespace'  => 'App\\Assets\\',
    'containers' => app_path().'/Assets/',
    'packages'   => [
        'Jquery'      => ['ResourcesLoader\Jquery', '2.2.4'],
        'Fontawesome' => ['ResourcesLoader\Fontawesome', '4.6.3'],
    ],
    'version' => [
        'Jquery'      => '2.2.4',
        'Fontawesome' => '4.6.3',
    ],
];
