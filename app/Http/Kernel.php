<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // \App\Http\Middleware\EncryptCookies::class,
            // \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            // \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Soved\Laravel\Helpers\Http\Middleware\SetPreferredLocale::class,
            \Spatie\Csp\AddCspHeaders::class,
            \Mazedlx\FeaturePolicy\AddFeaturePolicyHeaders::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        'nova.web' => [
            Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Soved\Laravel\Helpers\Http\Middleware\SetPreferredLocale::class,
            // \Spatie\Csp\AddCspHeaders::class,
            \Mazedlx\FeaturePolicy\AddFeaturePolicyHeaders::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'          => Middleware\Authenticate::class,
        'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.magic'    => \Soved\Laravel\Magic\Auth\Http\Middleware\AuthenticateWithMagicLink::class,
        'bindings'      => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'           => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'         => Middleware\RedirectIfAuthenticated::class,
        'signed'        => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'      => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces the listed middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        Middleware\Authenticate::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
