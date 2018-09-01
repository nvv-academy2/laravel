<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Response;

class CheckAdmin
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
        if ($request->user()->admin === User::REGULAR_USER) {
            return response()->json(['error' => "Access denied"], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
