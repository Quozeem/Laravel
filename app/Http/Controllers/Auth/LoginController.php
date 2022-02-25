<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\Pizza;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
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

    use AuthenticatesUsers;
      // protected $redirectTo='/dashboard';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        
        
     $this->middleware('guest')->except('logout');
       $this->middleware('guest:admin')->except('logout');
       $this->middleware('guest:member')->except('logout');
      
    }
    public function logouts(){
                // Session::flush();
                   
      // Auth::guard('admin')->logout();

     // return redirect('/pages/login');
    }
    
    public function index()
    {
        return view('home');
    }
    
    public function showlogin(){
        return view('pages.login');
               
           }
  public function login(Request $request){
      // Retrive Input
      $credential=$request->validate([
          'email'  =>'required',
          'password'=> 'required'
         ]);
      $user_data =array(
          'email'=>$request->get('email'),
          'password'=>$request->get('password'),
          'role'=> 'Admin',
      );
      $userdata =array(
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
        'role'=> 'User',
    );
   if (Auth::guard('admin')->attempt( $user_data ,$request->filled('remember'))) {
          // if not success login
          return redirect()->route('admin');
         // return redirect('/dashboard');
       
        
      }
      if (Auth::guard('member')->attempt( $userdata ,$request->filled('remember'))) {
        // if not success login
        return redirect()->route('dashboard');
       // return redirect('/dashboard');
     
      
    }
     //$user =DB::table('pizzas')->where('email',Auth::user()->email)->count();
     return redirect('/pages/login')->with('error','The Credential you enter is not in our record');
     
     // return redirect()->route('dashboard');
      //return redirect()->intended(route('admin.route');
     // else{
      // if failed login
    //  return redirect('/pages/login')->with('error','The Credential you enter is not in our record');
//  }
}

public function loginuser(Request $request){
    // Retrive Input
    $credential=$request->validate([
        'email'  =>'required',
        'password'=> 'required'
       ]);
    $user_data =array(
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
    );
    // $request->only('email', 'password');
   if (!Auth::attempt( $user_data ,$request->filled('remember'))) {
        // if success login

       // return redirect('/dashboard');
       return redirect('/login')->with('error','The Credential you enter is not in our record');

      
    }
    return redirect()->route('home');
    //return redirect()->intended(route('admin.route');
   // else{
    // if failed login
  //  return redirect('/pages/login')->with('error','The Credential you enter is not in our record');
//  }
}
}
