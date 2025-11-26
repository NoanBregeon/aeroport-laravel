<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check() || auth()->user()->is_admin == 1) {
            abort(403, 'Accès réservé aux opérateurs.');
        }

        return $next($request);
    }
}
