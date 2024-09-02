<?php

use Furqat\LaravelConsoleLog\LaravelConsoleLog;

if (!function_exists('console')) {

    function console()
    {
        return app(LaravelConsoleLog::class, ['trace' => debug_backtrace()[0] ?? []]);
    }

}
