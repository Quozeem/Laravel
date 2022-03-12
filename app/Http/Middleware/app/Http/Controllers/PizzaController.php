<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\LoginController;
//use App\Providers\RouteServiceProvider1;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pizza;
use App\Models\Shipping;
use App\Models\User;
use validator;
use Redirect;
use Response;

class PizzaController extends Controller
{
   
    public function __construct()
    {
     // $this->middleware('guest')->except('logout');
     // $this->middleware('guest:admin')->except('logout'); 
      // $this->middleware('guest')->except('logout');
      // $this->middleware('admin');
    }
   
    
    public function index(){
         //get data from databse
        $pizza = [
            ['type' => 'Hawali','base' => 'Chinnesy','price' => 10],
            ['type' => 'iphone','base' => 'nigeria','price' => 20],
            ['type' => 'android','base' => 'ghana','price' => 30]
        ];
    $name = request('name');
        return view('pages.pizza', ['pizza' => $pizza, 'names' => $name]);
          // return 'Pizza!'; strings
 // return ['name' => 'veg pizzas','base' => 'classic']; json 
    }
    public function reset(){
      return  view('pages.reset');
    }
    public function forgetedit($token){
      return  view('pages.forget',['token'=>$token]);
    }
    public function show($id){
        $pizza=Pizza::findorfail($id);
     return view('pages.details',['id'=>$pizza]);
          // use id variable for query database
    }
    
    public static function looptest(){
      $pizzac= Pizza::latest()->get();
      return $pizzac;
    }
      //return view('pages.pizzasloopdb',['pizzas' => $pizzac]);
    public static function loop(){
$pizzac= Pizza::latest()->get();
return view('pages.pizzasloopdb',['pizzas' => $pizzac]);
        
    }
    public function shipping_rate($id){
     $name_city  = Shipping::where('id',$id)
                        ->get();
    return response()->json(
       $name_city 
   );  
  }   
  public function uploadall(Request $request){
    if(count($request->states_name) > 0)
    {
     foreach($request->states_name as $key=>$values)
     {
       $data= array(
        'states_name'=>$request->states_name[$key],
        'rates'=>$request->rates[$key],
        'state_id'=>$request->state_id[$key],
       );
       $user=Shipping::create($data);
      } 
    }
return redirect()->back();
      }
  
    public function create(){
      $shipping_rate=Shipping::get();
    // $shipping_fee=$this->shipping_rate($request);
        return view('pages.create',['rate'=> $shipping_rate]);
                
            }
            public function emailcheck(Request $request){


            //  $data = $request->all(); // This will get all the request data.
            //  $userCount = Pizza::where('email',$email)->exists();
             // if ($userCount->count()) {
               // return Response::json(array('msg' => 'true'));
           
                 // $fetch=Auth::guard('admin')->user()->email ;
                   // return Response::json(array('msg' => 'false'));
             
            }
           public function passrest(Request $request){
           // Retrive Input
      $email=$request->validate([
        'email'  =>'required|email|exists:pizzas',
       'password'=> 'required',
       //'remember_token'=>'required'
       ],[
          'email.required'=>'Email is required',
          'password.required'=>'Password is required',
       ]);
      $update=Pizza::where(
        'email', $request->email
       // ,'remember_token', $request->remember_token
         )->
      update(['password'=>Hash::make($request->password)
    ]);
     
         
           return  view('pages.reset',['alert'=>'UPDATED']);
         
          }
    public function store(Request $request){
        $validator=$request->validate([
            'file' => 'required|mimes:png,jfif,jpeg,jpg|max:2048|unique:pizzas',
            'email' => 'required|unique:pizzas',
            'name' => 'required|min:10',
            'price' => 'required|numeric',
            'type' => 'required',
            'base' => 'required',
           'topping' => 'required',
          'role'=> 'required',
            'password'=>'required|alphaNum|min:6|max:12',
        ],
       
       [
            'name.required'=>'Name is required',
            'role.required'=>'Role is required',
            'price.required'=>'Price is required',
            'email.required'=>'Email is required',
          'file.required'=>'Image is required',
            'password.required'=>'Password is required'
            
        ]);
      
       // if($validator){
         //   Pizza::create($request->all());
        //}
      
     //   $fileModel = new Pizza();
    
    
    
$validator=$request->all();
$validator['password']= Hash::make($validator['password']);
        if($images= $request->file('file')) {
           $destinationpath='img/';
            $profileimage = $images->getClientOriginalName();
            $images->move($destinationpath,$profileimage);
           $validator['file']=$profileimage;
           // $validator->save();
        }
        $user=Pizza::create($validator);
     //error_log(request('name'));
     //$pizz=new Pizza();
     //$pizz->name=request('names');
     //$pizz->base=request('bases');
     //$pizz->type=request('types');
     //$pizz->price=request('prices');
     //$pizz->topping=request('toppings');
     
   // return (request('toppings'));
   /// $pizz->save();
   
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
    // if  success login
    return redirect()->route('admin');
   // return redirect('/dashboard');
 
  
}
if (Auth::guard('member')->attempt( $userdata ,$request->filled('remember'))) {
  // if not success login
  return redirect()->route('dashboard');
 // return redirect('/dashboard'); */

}
// return redirect('/pages/login');//->with('thanks','Thanks for your order');
                
            }
            public function not_allowed(){
              return view('not_allowed');
            }
 public function destroy($id){
     $pizza=Pizza::findorfail($id);
     $pizza->delete();
     return redirect('/pages/pizzasloopdb');
 }
 public function edit(){
    $pizzac= Pizza::latest()->get(); 
 return view('pages.edit',['pizzas'=>$pizzac]);
}public function update(){
    $update=Pizza::all();
    return view('pages.update',['pizzas'=>$update]);
}
public function updateid($ids){
    $updated=Pizza::findorfail($ids);
    return view('pages.updateid',['edit'=>$updated]);
}
public function UPDATES($edit){
    
    $pizz=Pizza::findorfail($edit);
    $pizz->name = request('names');
     $pizz->price = request('prices');
   $pizz->update();
return redirect('/pages/update')->with('thanks','Update Succussful');
               
           }
         
                 public function admindash()
                 {
                     return view('dashboard'); 
                 } 
                 public function Admin()
                 {
                  $selected=Pizza::get(); 
                  return view('admin',['select' => $selected]);
                    
                 }  
          public function adminfetch(){
              $selected=Pizza::get(); 
            
                return view('dashboard',['select' => $selected]);
           } 
          public function delid($id)  {
            $pizza=Pizza::findorfail($id);
            $pizza->delete();
            return redirect('dashboard');
          } 
          public function editid($id){
            $fetch=Pizza::findorfail($id);
            return view('dashboardedit',['select' => $fetch]);
          }
          public function updatedash(Request $request,$id ){
             $credential=$request->validate([
              'email' => 'required',
              'name' => 'required',
              'price' => 'required',
              'password' => 'required',
             ]);
             $credential=Pizza::findorfail($id);
             $credential->name = request('name');
             $credential->email = request('email');
             $credential->price = request('price');
             $credential->password= Hash::make(request('password'));
             //$credential->password = request('password');
             $credential->update();
            // alert()->success('wel','qoztore.com') ->autoclose(3500);
             return redirect('dashboard')->with('thanks','Update Succussful');
          }
        
          public function jointable(){
            $data=Pizza::join('users','users.id', '=','pizzas.id')
            ->get(['pizzas.id','pizzas.base','pizzas.name','pizzas.price','users.email','users.password']);
            return view('pages/jointable',compact('data'));
          }
     
}