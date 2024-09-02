<?php

use Furqat\LaravelConsoleLog\Http\Controllers\LaravelConsoleLogController;
use Furqat\LaravelConsoleLog\LaravelConsoleLogServiceProvider;
use Illuminate\Support\Facades\Route;

Route::get(config('console-log.route-prefix'), LaravelConsoleLogController::class)->name('laravel-console-log');
