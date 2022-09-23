<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pizza;
//use validator;
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
          //  $this->middleware('guest:blogger')->except('logout');
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
        );
        // $request->only('email', 'password');
       if (!Auth::guard('webadmin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->filled('remember'))) {
            // if success login

           // return redirect('/dashboard');
           return redirect('/pages/login')->with('error','The Credential you enter is not in our record');

            //return redirect()->intended('/details');
        }
        return redirect()->route('dashboard');
        //return redirect()->intended(route('admin.route');
       // else{
        // if failed login
      //  return redirect('/pages/login')->with('error','The Credential you enter is not in our record');
  //  }
}
public function Role(Request $request){
    // Retrive Input
    $credential=$request->validate([
        'email'  =>'required',
        'password'=> 'required'
       ]);
    $user_data =array(
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
    );
    $login=DB::table('pizzas')->where([
        'email'=>$request->email,
        'password'=>$request->password,
        ])->first();

}
}
