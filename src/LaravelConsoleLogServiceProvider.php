<?php

namespace Furqat\LaravelConsoleLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelConsoleLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-console-log')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasViews();
    }
}
