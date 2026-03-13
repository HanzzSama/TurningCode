<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

class DesktopOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $agent = $request->header('User-Agent');

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $agent)) {
            abort(403, 'Admin panel hanya bisa diakses melalui desktop.');
        }

        return $next($request);
    }
}
