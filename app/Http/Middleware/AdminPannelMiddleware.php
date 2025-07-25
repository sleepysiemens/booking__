<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPannelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->is_admin !== null && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        return redirect(route('main.index'));
    }
}
