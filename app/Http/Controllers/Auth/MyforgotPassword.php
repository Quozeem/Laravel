<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Mail;
use Hash;
use DB;
use Illuminate\Support\Str;
Use Carbon\Carbon;
use App\Models\Pizza;
use Illuminate\Support\Facades\Session;
class MyforgotPassword extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    
      // protected $redirectTo='/dashboard';
    /**
     * Where to redirect users after login.
     *
     *
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        
        
     //$this->middleware('guest')->except('logout');
      // $this->middleware('guest:admin')->except('logout');
      
    }
  public function emailcheck(Request $request){
      // Retrive Input
      $email=$request->validate([
          'email'  =>'required|email|exists:pizzas',
         
         ],[
            'email.required'=>'Email is required',
         ]);
         $token=Str::random(64);
         $checkmail=DB::table('pizzas')->where(['email'=>$request->email])->first();
         if(!$checkmail){
            return view('pages.reset');
        
         }
         $insert=Pizza::where('email', $request->email)->
         update(['remember_token'=>Hash::make($token)]);
         Mail::send('email.forgotPassword',['token'=>$token],function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password');
      });
      return back()->with('message', 'We have e-mailed your password reset link!');
         //return redirect('/forget');
    
 }

}
