<?php

namespace App\Http\Middleware;

use Closure;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        file_put_contents("log.txt", json_encode($request->route()).json_encode($request->all()).PHP_EOL, FILE_APPEND);
        return $next($request);
    }
}
