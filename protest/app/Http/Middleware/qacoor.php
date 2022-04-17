<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class qacoor
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        #1 is role admin
        if(Auth::user()->role == 1){
            return redirect()->route('admin');
        }
        #1 is role QA manager
        if(Auth::user()->role == 2){
            return redirect()->route('qamanager');
        }
        #1 is role QA coordinator
        if(Auth::user()->role == 3){
            return $next($request);
        }
        #1 is role staff
        if(Auth::user()->role == 4){
            return redirect()->route('staff');
        }
    }
}
