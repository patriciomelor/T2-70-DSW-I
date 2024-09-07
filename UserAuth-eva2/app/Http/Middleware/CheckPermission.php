<?php
// app/Http/Middleware/CheckPermission.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission) {
        dd('Middleware CheckPermission ejecutado');
        // Verificar si el usuario autenticado tiene el permiso requerido
        if (Auth::check() && Auth::user()->role->permissions->contains('name', $permission)) {
            return $next($request);
        }

        // Si el usuario no tiene el permiso, redirigir a una página de error o al home
        return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}
