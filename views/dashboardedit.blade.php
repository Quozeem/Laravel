@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Wecome to Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="card mb-3">
            <div class="card-body">
            <div class="table-responsive fs--1">
               <form method="post" action="/UPDATE/{{$select->id}}">
               @csrf
         @method('PUT')     
          
<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
           
                
                <input type="text" class="form-control @error('name') is-invalid @enderror" name='name' value="{{ $select->name}}">
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div></div>    

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
     
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ $select->email}}" required autocomplete="email" autofocus 
               >
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div></div>
  
<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

    <div class="col-md-6">
           
                
                <input type="text" class="form-control @error('price') is-invalid @enderror" name='price' value="{{ $select->price}}">
                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div></div>  

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
           
                
                <input type="text" class="form-control @error('price') is-invalid @enderror" name='password' >
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div></div>  
<div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE') }}
                                </button>

                             
                                
                            </div>
                        </div>
              
                    </form>
                     
</div></div></div>
@endsection
