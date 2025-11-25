<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleFromUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = config('app.locale'); // langue par défaut (ex: fr)

        // Si l'utilisateur est connecté et a une locale en base
        if ($request->user() !== null && $request->user()->locale) {
            $locale = $request->user()->locale;
        } elseif ($request->session()->has('locale')) {
            // Sinon on regarde en session (invité ou première connexion)
            $locale = $request->session()->get('locale');
        }

        App::setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}
