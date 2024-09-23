<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se a localidade está presente na solicitação
        $locale = 'en';
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            session(['locale' => $locale]);
        }

        // Define a localidade da aplicação
        return $next($request);
    }
}
