@extends('pages.layout')
   @section('content')
        
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
     <p> you'll be redirect in 2Seconds</p>
<script>
    var counter = 10;

    // The countdown method.
    window.setInterval(function () {
        counter--;
        if (counter >= 0) {
            var span;
            span = document.getElementById("cnt");
            span.innerHTML = counter;
        }
        if (counter === 0) {
            clearInterval(counter);
        }

    }, 1000);

    window.setInterval('refresh()', 2000);

    // Refresh or reload page.
    function refresh() {
        window  .location.href="{{ route('dashboard')}}";
    }
</script>
      <p style="padding:18% 45%;font-size:23px">
          @if (Session::has('Error'))
        {{Session::get('Error') }}
          @endif
    </p>
           @endsection
 