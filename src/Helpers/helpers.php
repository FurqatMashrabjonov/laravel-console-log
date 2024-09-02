<?php

use Furqat\LaravelConsoleLog\LaravelConsoleLog;

if (! function_exists('console')) {
    /**
     * Get the LaravelConsoleLog instance.
     *
     * @return Furqat\LaravelConsoleLog\LaravelConsoleLog
     */
    function console()
    {
        return app(LaravelConsoleLog::class, ['trace' => debug_backtrace()[0] ?? []]);
    }

}
