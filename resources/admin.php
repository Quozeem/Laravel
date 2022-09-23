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
Route::get('/pages/create', 'PizzaController@
 //Route::middleware(['auth','isAdmin'])->group(function(){
   // Route::get('/admin',function(){
     ///   return view('admin.dashboard');
    //})->name('dashboard');
//});
