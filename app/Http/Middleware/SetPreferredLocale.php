<?php

namespace App\Http\Middleware;

use App;
use Closure;

class SetPreferredLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle(
        $request,
        Closure $next
    ) {
        $availableLocales = [
            config('app.locale'),
            config('app.fallback_locale'),
        ];

        $locale = $request->getPreferredLanguage($availableLocales);

        App::setLocale($locale);

        return $next($request);
    }
}
