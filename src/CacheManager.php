<?php

namespace Furqat\LaravelConsoleLog;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CacheManager
{
    public function put(array $data, string $type, array $trace): void
    {
        $logs = $this->pull();
        $logs[] = [
            'type' => $type,
            'data' => $data,
            'trace' => $trace,
        ];
        cache()->put(config('console-log.cache.key'), $logs, config('console-log.cache.ttl'));
    }

    public function pull(): array
    {
        return collect(cache()->pull(config('console-log.cache.key')))->toArray();
    }

    public function get()
    {
        $logs = collect();
        try {
            $logs = collect(cache()->get(config('console-log.cache.key')));
        } catch (\Exception|NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            // do nothing
        } finally {
            return $logs->toArray();
        }
    }

    public function count(): int
    {
        return count($this->get());
    }

    public function clear(): void
    {
        cache()->forget(config('console-log.cache.key'));
    }

    public function __toString(): string
    {
        return json_encode($this->get());
    }

    public function pop()
    {
        $logs = $this->pull();
        $log = array_shift($logs);
        cache()->put(config('console-log.cache.key'), $logs, config('console-log.cache.ttl'));

        return $log;
    }
}
