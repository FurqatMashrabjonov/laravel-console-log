<?php

namespace Furqat\LaravelConsoleLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Furqat\LaravelConsoleLog\LaravelConsoleLog
 */
class LaravelConsoleLog extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Furqat\LaravelConsoleLog\LaravelConsoleLog::class;
    }
}
