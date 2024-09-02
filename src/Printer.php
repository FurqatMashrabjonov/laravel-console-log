<?php

namespace Furqat\LaravelConsoleLog;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Printer
{
    public function print(array $log)
    {
        $type = $log['type'];
        $message = '';
        $location = $this->truncateLocation($log['trace']['file']);
        $line = $log['trace']['line'];
        $style = $this->style($type);

        foreach ($log['data'] as $data) {
            $message .= PHP_EOL;
            $message .= is_string($data) ? $data : json_encode($data);
        }

        return [
            "%c$type %c$message%c $location:$line",
            $style['badge'],
            $style['message'],
            $style['exit'],
        ];

    }

    public function truncateLocation(string $location): string
    {
        return Str::of($location)
            ->replace('/', '\\')
            ->trim('\\')
            ->explode('\\')
            ->when(
                fn (Collection $classOrType) => $classOrType->count() > 4,
                fn (Collection $classOrType) => $classOrType->take(2)->merge(
                    ['…', (string) $classOrType->last()]
                ),
            )->implode('\\');
    }

    public function style(string $type): array
    {
        $styles = [
            'badge' => [
                'padding' => '0 4px',
                'background-color' => $this->color($type),
                'color' => 'white',
                'text-transform' => 'uppercase',
                'border-radius' => '2px',
            ],
            'message' => [
                'margin-left' => '4px',
            ],

            'exit' => [
                'color' => 'gray',
                'margin-left' => '4px',
            ],
        ];

        $style = fn (array $styles) => collect($styles)
            ->map(fn ($value, $property) => "$property: $value")
            ->join(';');

        return [
            'badge' => $style($styles['badge']),
            'message' => $style($styles['message']),
            'exit' => $style($styles['exit']),
        ];
    }

    public function color(string $type): string
    {
        return match ($type) {
            'log' => '#007bff',
            'error' => '#dc3545',
            'warn' => '#ffc107',
            default => '#6c757d',
        };
    }
}
