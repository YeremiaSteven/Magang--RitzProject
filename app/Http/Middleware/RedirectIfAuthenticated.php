<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        $user = Auth::user();

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($user->istatus_user == 1){
                    if ($user->id_role == 44441){
                        return redirect(RouteServiceProvider::ADMIN);
                    } elseif ($user->id_role == 44442){
                        return redirect(RouteServiceProvider::STAFF);
                    } elseif ($user->id_role == 44443){
                        return redirect(RouteServiceProvider::HOME);
                    }
                }
            }
        }

        return $next($request);
    }
}
