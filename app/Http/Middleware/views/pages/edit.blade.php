@extends('pages.layout')
@section('content')
<div class="container">
    <h1>Create a New Pizza</h1>
    @foreach($pizzas as $id)
     <form method="post" action="/pages/{{$id ->id}}">
         @csrf
         @method('DELETE')
     <div class="text" style="text-align: center;">
      <p>Please fill in this form to create an account.</p>
     </div>
      <input type="hidden" name="id">
      <hr>
      <label>Your name:</label>
      <input type="text"  name="names" value="{{ $id ->name}}" required>
      <label>Price :</label>
      <input type="text"  name="prices" value="{{ $id ->base}}" required>
      <div class="clearfix">
        
        <button name="submit" class="signupbtn">Delete </button>
      </div>
  </form>
  @endforeach
</div>
     @endsection