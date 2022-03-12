@extends('pages.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
<h1>Click on the link below to Reset your password
 <a href="{{ route('forget',$token) }}">Reset Password</a>
                
            </div>
        </div>
    </div>
</div>
@endsection
