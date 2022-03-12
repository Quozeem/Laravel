@extends('pages.layout')
@section('content')
        <div class="flex-center postion-ref full-heght">
          
       <div class="content">
  <div class="title m-b-mb">Pizza List <br>
<img src="/img/aish1.jpg" alt="logo"  width="400">
         </div>
        <p>{{ $names }}</p>
         @php
         $name="ademola";
         echo $name;
         @endphp
         @for($i=0; $i < 5 ; $i++) 
         <p>The value of i {{ $i }}
         @endfor
         @for($i=0;$i < count($pizza);$i++)
         <p>{{ $pizza[$i]['type']}}
         @endfor
         <div>
         @foreach($pizza as $piz)
          {{ $loop ->index }} {{ $piz['type'] }} --- {{ $piz['base']}} -- {{ $piz['price']}}
         @if($loop ->first)
         <span>first in the loop</span>
         @endif
         @if($loop ->last)
         <span>last in the loop</span>
         @endif
         @endforeach
         </div></div> </div>
     @endsection