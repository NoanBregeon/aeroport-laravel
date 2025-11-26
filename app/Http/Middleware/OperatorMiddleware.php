<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_operator == 1) {
            return $next($request);
        }

        return redirect()->route('dashboard')
            ->with('error', 'Accès réservé aux opérateurs.');
    }
}
