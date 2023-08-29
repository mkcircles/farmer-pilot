<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        //here you can check the request to be logged
        $log = [
            'URI' => $request->getUri(),
            'METHOD' => $request->getMethod(),
            'REQUEST_BODY' => $request->all(),
            'RESPONSE' => $response->getContent()
        ];

        Log::info("==========================================\n\n\n");
        Log::info("Request URI", $request->getUri()."\n");
        Log::info("Request METHOD", $request->getMethod()."\n");
        Log::info("Request REQUEST_BODY", $request->all()."\n");
        Log::info("Request RESPONSE", $response->getContent()."\n");
        Log::info("==========================================\n\n\n");

        return $response;
    }
}
