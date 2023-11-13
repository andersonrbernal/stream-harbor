<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1, config('app.locale'));

        $isLocaleSupported = in_array($locale, config('app.available_locales'));

        if ($isLocaleSupported) {
            app()->setLocale($locale);
            return $next($request);
        }

        app()->setLocale(config('app.locale'));

        return $next($request);
    }
}
