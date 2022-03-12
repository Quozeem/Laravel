<?php

namespace App\Http\Middleware;
//use App\Providers\RouteServiceProviderS;
use Closure;
use Illuminate\Http\Request;
use DB;
use App\Models\Pizza;
use Session;
use Illuminate\Support\Facades\Auth;
class UseredMiddleware
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
       
        /* $check =  DB::table('pizzas')
        ->where('role', 'User')
        ->where('admintype_create',1)
        ->first(); 
if($check == null){ */
     
  $check =  Auth::guard('member')->user()->admintype_create;
  
  if($check == 0){
      Session::flash("Error","Unauthorized Page,401");
      // return Redirect::back();
   //   return response()->json('not_allowed',['error' => 'Unauthenticated']);
   //   return response()->json(['data'=>'Not allow'],401);
     return  redirect('not_allowed');
 //return  redirect()->back();
}else{
 return $next($request);
}
}
}
