@extends('pages.layout')
@section('content')
<div class="container">
    <h1>Create a New Pizza</h1>
  
    <form method="post" action="/pages/{{$edit ->id}}">
         @csrf
         @method('PUT')
     <div class="text" style="text-align: center;">
      <p>Please fill in this form to create an account.</p>
     </div>
      <input type="hidden" name="id">
      <hr>
      <label>Your name:</label>
      <input type="text"  name="names" value="{{ $edit ->name}}" required>
      <label>Price :</label>
      <input type="text"  name="prices" value="{{ $edit -> price}}" required>
      <div class="clearfix">
        
        <button name="submit" class="signupbtn">update </button>
      </div>
</form>
</div>
     @endsection