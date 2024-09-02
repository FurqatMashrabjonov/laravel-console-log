<?php

namespace Furqat\LaravelConsoleLog\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InjectHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);
        if ($response instanceof Response &&
            $response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $html = view('console-log::inject')->render();
            $response->setContent(
                str_replace(
                    '</body>',
                    $html.'</body>',
                    $response->getContent()
                )
            );
        }

        return $response;
    }
}
