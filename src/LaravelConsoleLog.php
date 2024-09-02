<?php

namespace Furqat\LaravelConsoleLog;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class LaravelConsoleLog
 *
 * @method void log(...$arguments)
 * @method void info(...$arguments)
 * @method void warning(...$arguments)
 * @method void error(...$arguments)
 */

class LaravelConsoleLog
{
    protected CacheManager $cacheManager;

    protected array $availableMethods = [
        'error',
        'warn',
        'table',
        'info',
        'log',
    ];

    protected array $trace;

    public function __construct(array $trace)
    {
        $this->cacheManager = new CacheManager;
        $this->trace = $trace;
    }

    public function table(Arrayable|array $data): void
    {
        $this->putToCache($data instanceof Arrayable ? $data->toArray() : $data, 'table');
    }

    public function __call(string $name, array $arguments)
    {
        if (in_array($name, $this->availableMethods)) {
            $this->putToCache($arguments, $name);

            return;
        }

        throw new \BadMethodCallException("Method $name does not exist");
    }

    protected function putToCache(array $data, string $type): void
    {
        $this->cacheManager->put($data, $type, [
            'file' => $this->trace['file'] ?? '',
            'line' => $this->trace['line'] ?? '',
        ]);
    }
}
