                @extends('pages.layout')
   @section('content')
        <div class="flex-center postion-ref full-heght">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else  
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          
       <div class="content">
       {{ session('thanks') }}
           <p>{{ $price}} </p>  <p>{{ $age }} </p>
  <div class="title m-b-mb">Pizza House<br>
             The North's Best Pizzas
         </div>
        
         <div class="links">
         <a href="http://127.0.0.1:8000/pages/pizza">Pizza</a>
         <a href="{{route('jointable')}}">Jointabel</a>
        <a href="http://127.0.0.1:8000/pages/create">Create New Pizza</a>
        <a href="http://127.0.0.1:8000/pages/edit">Delect Pizza</a>
        <a href="http://127.0.0.1:8000/pages/update">update</a>
        <a href="http://127.0.0.1:8000/pages/login">Login</a>
        <a href="https://laravel.com/github">Github</a>
        </div> </div> 
        </div>
           @endsection
 