<?php

namespace App\Http\Middleware;
//use App\Providers\RouteServiceProviderS;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
       
     if (!Auth::guard('member')->check()) {
            
                return redirect('/pages/login');
             }

        // }
       
       // return redirect('Admin'); 
         return $next($request);
    //}
       // else{
        // if failed login
       // return redirect('/pages/login');
 
//} 
 
    }
}
