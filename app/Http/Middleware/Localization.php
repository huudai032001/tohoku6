<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {        
        if ($request->filled('setLocale') && session('locale') != $request->input('setLocale')) {
            session()->put('locale', $request->input('setLocale'));
        }

        $locale = session('locale', config('app.locale'));

        \App::setLocale($locale);
        \Carbon\Carbon::setLocale($locale);

        return $next($request);
    }
}
