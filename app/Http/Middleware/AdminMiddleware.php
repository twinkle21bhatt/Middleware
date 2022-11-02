<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
// admin  == 1
//  user == 0


       if (Auth::check()){
        if (Auth::user()->admin == '1') {
            return $next($request);
        }else {
            return redirect()->route('home')->with('message','Access Denied because user is not an admin');
        }

       }else{
        return redirect('/login')->with('message','Access Denied please login');
       }
        return $next($request);
    }
}
