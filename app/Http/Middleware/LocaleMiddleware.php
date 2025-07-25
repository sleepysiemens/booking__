<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::get('locale') !== null) {
            App::setLocale(Session::get('locale'));

            return $next($request);
        }

        Session::put('locale', 'ru');
        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
