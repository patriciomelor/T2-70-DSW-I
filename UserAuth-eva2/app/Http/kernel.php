<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // Otros middlewares globales
        \App\Http\Middleware\HandleInertiaRequests::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Otros middlewares
            \App\Http\Middleware\RedirectIfAuthenticated::class,
            \App\Http\Middleware\UpdateLastLogin::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
            'auth:api',  // Middleware JWT agregado
        ],
    ];
    

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Otros middlewares de ruta
        'jwt.auth' => \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
    ];
    
}
