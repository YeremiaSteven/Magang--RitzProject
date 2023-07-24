<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        $admin = Auth::user();

        if($role == 'admin'){
            $role = 44441;
        } else if ($role == 'staff'){
            $role = 44442;
        } else if ($role == 'home'){
            $role = 44443;
        }

        if (!Auth::check()) {
            return redirect('login');
        }
        if ($user->istatus_user == 1){
            if ($user->id_role == $role){
                return $next($request);
            }
            // 
        } else if ($admin->istatus_admin == 1){
            if($admin->id_role == $role){
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
