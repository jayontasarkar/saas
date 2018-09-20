<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIntendedAfterSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! auth()->check() ) {
            session()->put('redirect:intended', route('subscription.index'));
            return redirect()->route('register');
        }
        return $next($request);
    }
}
