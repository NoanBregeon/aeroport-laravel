<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur est admin → il a accès aussi
        if (auth()->check() && auth()->user()->is_operator) {
            return $next($request);
        }

        // Sinon on renvoie vers la page d'accueil
        return redirect()->route('dashboard')->with('error', 'Accès réservé aux opérateurs.');
    }
}
