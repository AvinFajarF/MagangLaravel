<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_blocked
{

    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){

            if (Auth::user()->status != 'active') {
                Auth::logout();
                return redirect('/login')->with('message','Maaf akun anda di banned');
            }

        }


        return $next($request);
    }
}
