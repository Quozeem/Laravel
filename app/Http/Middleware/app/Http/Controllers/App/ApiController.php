<?php

namespace App\Http\Controllers\App;
use App\Models\Pizza;
use Hash;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PizzaController;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    
  
public function index(){
    
   $fromloop=PizzaController::looptest();
    $pizza = [
        ['type' => 'Hawali','base' => 'Chinnesy','price' => 10],
        ['type' => 'iphone','base' => 'nigeria','price' => 20],
        ['type' => 'android','base' => 'ghana','price' => 30]
    ];
$name = request('name');
    return view('pages.index', ['pizza' => $fromloop, 'names' => $name]);
}
}
