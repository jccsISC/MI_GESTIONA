<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect($this->redirectTo());
        }

        return $next($request);
    }

    public function redirectTo () {
        switch (Auth::user()->roles->first()->name) {
            case 'admin':
                return 'A';
            break;
            case 'tutor':
                return 'T';
            break;
            case 'orientador':
                return 'OE';
            break;
            case 'tsocial':
                return 'TS';
            break;
            case 'maestro':
                return 'M';
            break;
        }
        
    }
}
