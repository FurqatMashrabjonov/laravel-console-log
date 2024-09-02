<?php

namespace Furqat\LaravelConsoleLog\Commands;

use Illuminate\Console\Command;

class LaravelConsoleLogCommand extends Command
{
    public $signature = 'laravel-console-log';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
