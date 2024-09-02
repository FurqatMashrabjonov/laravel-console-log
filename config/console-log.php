<?php

return [

    'enabled' => env('CONSOLE_LOG_ENABLED', true),

    'cache' => [
        'key' => 'laravel-console-log',
        'ttl' => 3600,
    ],
];
