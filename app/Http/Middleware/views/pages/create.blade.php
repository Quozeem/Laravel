@extends('pages.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        
      @php
      if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $_SESSION['flash']= $name;
          echo  $_SESSION['flash'];
      }
      @endphp
                <div class="card-body">
                 
 <h1> Create a new Pizza</h1>
 <form  method="post" action="{{ route('uploadall')}}" enctype="multipart/form-data">
 {{ csrf_field() }}
<div class="card mb-3">
            <div class="card-body">
            <div class="table-responsive fs--1">
                <table   class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                  
                    <tr>
                      <th class="border-0">S/N</th>
                      <th class="border-0 text-center">state_id</th>
                      <th class="border-0 text-center">state_name</th>
                      <th class="border-0 text-end">Rate</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rate as $row)
                  <tr class="border-200">
                 
                      <td class="align-middle">{{ $row->id}} </td>
                      <td class="align-middle text-center"> <input name="state_id[]" value="{{ $row->state_id}}"></td>
                      <td class="align-middle text-center"><input name="states_name[]" value="{{ $row->states_name}}"></td>
                      <td class="align-middle text-end">#<input name="rates[]" value="{{ $row->rates}}"></td>
                     
                    </tr> @endforeach</tbody></table>
                     
</div></div></div>
 
                                    <button type="submit" name="submitted" class="btn btn-primary">
                                    {{ __('Edit Shipping Rate') }}</button>
                                   
    </form>
     <form method="post" action="/" enctype="multipart/form-data">
     {{ csrf_field() }}
         <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Name') }}:</label>
      <div class="col-md-6">
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{old('name')}}">
      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Password') }}:</label>
      <div class="col-md-6">
      <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('password')}}">
      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Price') }}:</label>
      <div class="col-md-6">
      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">

      @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Email') }}:</label>
      <div class="col-md-6">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  id="email">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
            </div> </div> 
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Pizza Type') }}:</label>
      <div class="col-md-6">
     <select name="type"  class="form-control @error('type') is-invalid @enderror" id="type" value="{{old('type')}}">
     <option value="">----select----</option>
         <option value="hwalian">Hwalian</option>
         <option value="Volcanoc">Volcanoc</option>
         <option value="Margarita">Margarita</option>
         <option value="Veg Supreme">Veg Supreme</option>
</select>
</div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Pizza Base') }}:</label>
      <div class="col-md-6">
<select name="base" id="type" class="form-control @error('base') is-invalid @enderror" value="{{old('base')}}">
     <option value="">----select----</option>
         <option value="Thick">Thick</option>
         <option value="thin & crispy">thin & crispy</option>
         <option value="garlic crust">garlic crust</option>
         <option value="cheesy crust">cheesy crust</option>
</select>
</div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Role') }}:</label>
      <div class="col-md-6">
<select name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{old('role')}}">
     <option value="">----select----</option>
         <option value="User">User</option>
         <option value="Admin">Admin</option>
        
</select>
</div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('State') }}:</label>
      <div class="col-md-6">

<select name="name_state"  id="name_state" class="form-control" data-dependent="state">
                                <option>-- Select State --</option>
                                @foreach($rate as $category)
                                    <option value="{{ $category->id }}">{{ ucfirst( $category->states_name )}}</option>
                                @endforeach
                            </select>
</div>
                        </div>
                        <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Shipping Rates') }}:</label>
      <div class="col-md-6">
      <select name="name_city"  id="name_city" class="form-control">
                               
                            </select>

</div>

                        </div>
     <fieldset> 
     <div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Topping') }}:</label>
      <div class="col-md-6">
      <input type="checkbox" class="form-control @error('topping') is-invalid @enderror" name="topping[]"
      value="mushroom">Mushroom<br>
      <input type="checkbox" class="form-control @error('topping') is-invalid @enderror" name="topping[]"
      value="peppers">Peppers<br>
      <input type="checkbox" class="form-control @error('topping') is-invalid @enderror" name="topping[]"
      value="garlic">Garlic<br>
      <input type="checkbox" class="form-control @error('topping') is-invalid @enderror" name="topping[]"
      value="olivers">Olivers<br>
</fieldset>   </div>  </div>
<div class="row mb-3">
      
      <label class="col-md-4 col-form-label text-md-right">{{ __('Upload') }}:</label>
      <div class="col-md-6">
      <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
      @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div> </div>
            <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
        
        <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('Order Pizza') }}</button>
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset ('assets/js/main.js') }}">
        </script>
     @endsection