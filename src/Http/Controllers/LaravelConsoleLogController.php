<?php

namespace Furqat\LaravelConsoleLog\Http\Controllers;

use App\Package\CacheManager;
use Furqat\LaravelConsoleLog\Printer;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LaravelConsoleLogController
{
    public function __invoke(Printer $printer)
    {
        $response = new StreamedResponse(function () use ($printer) {

            if (connection_aborted()) {
                return;
            }

            $cacheManager = new CacheManager;

            echo ':'.str_repeat(' ', 2048)."\n";
            echo 'retry: 2000'."\n";

            while ($cacheManager->count() !== 0) {

                if (connection_aborted()) {
                    return;
                }

                $log = $cacheManager->pop();

                $data = ['type' => $log['type']];

                if ($log['type'] !== 'table') {
                    $data['outputs'] = $printer->print($log);
                } else {
                    $data['outputs'] = $log['data'];
                }

                echo 'data: '.json_encode($data)."\n\n";

                ob_flush();
                flush();
                sleep(1);
            }

        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
