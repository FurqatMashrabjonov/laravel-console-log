<?php

return [

    'enabled' => env('CONSOLE_LOG_ENABLED', true),

    'cache' => [
        'key' => 'laravel-console-log',
        'ttl' => 3600,
    ],

    'route-prefix' => 'laravel-console-log',
];
