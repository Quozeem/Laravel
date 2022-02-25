@extends('pages.layout')
@section('content')
        <div class="flex-center postion-ref full-heght">
          
       <div class="content">
  <div class="title m-b-mb">Pizza List <br>
<img src="/img/aish1.jpg" alt="logo"  width="400">
         </div>
      
        <span> Order Name- <p>{{ $id ->name}}</p></span>
        <span>   Type- <p>{{ $id ->base}}</p>  </span> 
        <span>    Price -<p>{{ $id ->price}}</p> </span> 
        <span>    Topping Extra</p> </span> 
    <ul>  
  @foreach($id->topping as $topping)
{{ $topping }}

        @endforeach
</ul>
<form action="/pages/{{$id ->id}}" method="post">
@csrf
@method('DELETE')
<button>DELETE</button>
         </div></div> </div>
     @endsection