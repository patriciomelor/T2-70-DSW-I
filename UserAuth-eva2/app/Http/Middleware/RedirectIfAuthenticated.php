<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Asumiendo que el dashboard es donde quieres enviar a usuarios autenticados
            return redirect('backoffice.dashboard');
        }

        return $next($request);
    }
}