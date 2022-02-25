@extends('pages.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                  @if (!empty($status) )
                        <div class="alert alert-success" role="alert">
                        {{  ($status)}}
                        </div>
                 @endif
                 @if (!empty($alert) )
                        <div class="alert alert-success" role="alert">
                        {{  ($alert)}}
                        </div>
                 @endif
                    <form method="POST" action="{{ route('emailcheck')}}" id="registrationed">
                        @csrf
                       
                        <div class="row mb-3">
        
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                              
                             
                             
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" type="text/javascript"></script>

<script>    
    var email =  $("#email").val();
    $('#registration').validate({
        rules: {            
            email: {
                required: true,
                email: true,
                remote: {
                    url: '{{url('pass')}}',
                    type: "post",
                    data: {
                        email:$(email).val(),
                        _token:"{{ csrf_token() }}"
                        },
                    dataFilter: function (data) {
                        var json = JSON.parse(data);
                       // if (json.msg == "true") {
                        if (json.msg == "false") {
                            return "\"" + "We can't find a user with that email address." + "\"";
                        } else {
                            return 'true';
                        }
                    }
                }
            }
        },
        messages: {            
            email: {
                required: "Email is required!",
                email: "Enter A Valid EMail!",
                remote: "Email address does not exits!"
            }
        }
    });
</script>
@endsection
