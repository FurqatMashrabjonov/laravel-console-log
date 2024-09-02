<?php

namespace Furqat\LaravelConsoleLog;

use App\Package\LaravelConsoleLog;
use App\Package\Printer;
use Furqat\LaravelConsoleLog\Http\Middleware\InjectHtml;
use Illuminate\Contracts\Http\Kernel;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelConsoleLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-console-log')
            ->hasConfigFile()
            ->hasViews();

        $this->app->bind(LaravelConsoleLog::class, function ($app, $params) {
            return new LaravelConsoleLog($params['trace'] ?? []);
        });

        $this->app->bind(Printer::class, function () {
            return new Printer;
        });

        app(Kernel::class)->pushMiddleware(InjectHtml::class);
    }
}
