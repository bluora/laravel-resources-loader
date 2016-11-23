<?php

return [
    'namespace'  => 'App\\Assets\\',
    'containers' => app_path().'/Assets/',
    'packages'   => [
        'Jquery'      => ['ResourcesLoader\Jquery', '2.2.4'],
        'Jqueryui'    => ['ResourcesLoader\Jqueryui', '1.12.0'],
        'Fontawesome' => ['ResourcesLoader\Fontawesome', '4.6.3'],
    ],
    'version' => [
        'Jquery'        => '2.2.4',
        'JqueryUi'      => '1.12.0',
        'JqueryUiTheme' => 'smoothness',
        'Fontawesome'   => '4.6.3',
    ],
];
