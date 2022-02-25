@extends('pages.layout')
@section('content')
        <div class="flex-center postion-ref full-heght">
          
       <div class="content">
  <div class="title m-b-mb">Pizza List <br>
<img src="/img/Butterfly gown.jpeg" alt="logo"  width="400">
         </div>
       
         
         <div>
         @foreach($pizzas as $piz)
        <div style="color:red">
{{ $loop ->index }} {{ $piz -> name}}---{{ $piz -> base}} ----{{  $piz -> type }} --- {{  $piz -> price}}

</div>
         @endforeach

         <form>
<select>
@foreach($pizzas as $piz)
<option>
{{ $piz -> name}}
</option>@endforeach
</select>
</form>
         </div></div> </div>
     @endsection