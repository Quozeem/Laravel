@extends('pages.layout')
@section('content')
<div class="container">
    <h1>Create a New Pizza</h1>
    {{session('thanks')}}
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach($pizzas as $ids)
    
       <tr>
         <td>{{ $ids ->name}}</td>
         <td>{{ $ids ->price}}</td>
         <td>
           <a href="/pages/updateid/{{ $ids ->id}}">Edit
           
</a>
           </td>
</tr>
</tbody>
</table>
   
     
      
  @endforeach
</div>
     @endsection