<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtAuth
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
        try {
            // Autenticar el usuario con el token JSON Web Token
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                // Si no pasa la validación, arroja un error
                return response()->json(['Error' => 'No tiene autorización.'], Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            // Error cuando hay problemas con el token
            return response()->json(['Error' => 'El Token es inválido.'], Response::HTTP_BAD_REQUEST);
        }
        // Avanza con la solicitud
        return $next($request);
    }
}