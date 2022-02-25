<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $re=request('price');
    $reqme=request('age');
    return view('welcome',['price' =>$re,'age'=>$reqme]);
});
//Route::get('/forget/{$token}', 'App\Http\Controllers\Auth\MyforgotPassword@mail');
Route::post('/emailcheck', 'Auth\MyforgotPassword@emailcheck')->name('emailcheck');
Route::get('/forget/{$token}', 'PizzaController@forgetedit')->name('forget');
Route::get('/resetpassword', 'PizzaController@reset')->name('resetpassword');
Route::post('/resetted', 'PizzaController@passrest')->name('resetted');
//Route::get('pass', 'App\Http\Controllers\PizzaController@emailcheck')->name('pass');


Route::post('/', 'PizzaController@store');
Route::get('/pages/pizza','PizzaController@index'); 
Route::get('/pages/details/{id}', 'PizzaController@show');
Route::get('/pages/pizzasloopdb','PizzaController@loop');
Route::delete('/pages/{id}','PizzaController@destroy');
Route::get('/pages/edit', 'PizzaController@edit');
Route::put('/pages/{edit}', 'PizzaController@UPDATES');
Route::get('/pages/updateid/{ids}', 'PizzaController@updateid');
Route::get('/pages/update', 'PizzaController@update');
Route::get('/pages/create', 'PizzaController@create');

// Admin route
//Route::prefix('admin')->name('admin.')->group(function(){
 // Route::resource('/index','App\Http\Controllers\PizzaController@destroy');
//});

Route::get('/jointable','PizzaController@jointable')->middleware('member')->name('jointable');
//Route::get('/logout','App\Http\Controllers\Auth\LoginController@logouts')->name('logout');
Route::put('/UPDATE/{id}','PizzaController@updatedash')->middleware('member');
Route::get('/Admin','PizzaController@Admin')->middleware('admin')->name('admin');
Route::get('/dashboardedit/{id}','PizzaController@editid')->middleware('member')->name('dashboardedit');
Route::get('/dashboard','PizzaController@adminfetch')->middleware('member')->name('dashboard');//
Route::get('/delete/{id}','PizzaController@delid')->middleware('member')->name('delete');
Route::get('/edit/{id}','PizzaController@editid')->middleware('member')->name('edit');
//Route::get('/dashboard',function () {
 // $selected=Pizza::latest()->get(); 
 // return view('dashboard',['select' => $selected]);
 //Route::group(['prefix'=> 'member','namespace'=> 'Auth'],function(){

  Route::post('/pages/login', 'Auth\LoginController@login');
  Route::post('/login', 'Auth\LoginController@loginuser')->name('login');
  Route::get('/pages/login', 'Auth\LoginController@showlogin')->name('pages.login');
  Route::get('/home', 'Auth\LoginController@index')->name('home');
 //});
//})->middleware('admin')->name('dashboard');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware'=>['auth']],function(){
  Route::get('/home',function () {
   
    return view('home');
   
  })->middleware('auth')->name('home');
  
  

//Route::group(['middleware' => 'auth:admin'], function () {Auth::routes();Route::view('/dashboard', 'dashboard');});
//Route::group(['middleware' => 'auth:admin'], function () {
    
  //Route::view('/dashboard', 'dashboard');
//});

 //Route::middleware(['auth','isAdmin'])->group(function(){
   // Route::get('/admin',function(){
     ///   return view('admin.dashboard');
    //})->name('dashboard');
//});