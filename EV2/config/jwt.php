<?php
return [
    'secret' => env('JWT_SECRET'),
    'ttl' => (int) env('JWT_TTL', 60),
    'refresh_ttl' => (int) env('JWT_REFRESH_TTL', 20160),
    'algo' => env('JWT_ALGO', 'HS256'),
    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),
    'blacklist_grace_period' => env('JWT_BLACKLIST_GRACE_PERIOD', 10),
    'providers' => [
        'users' => Tymon\JWTAuth\Providers\Auth\Illuminate::class,
    ],
];