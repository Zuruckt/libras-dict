@extends('layouts.auth')

@section('content')
    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registro</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name') }}" placeholder="{{__('Name')}}" 
                    required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback text-center my-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" placeholder="{{__('E-Mail Address')}}" value="{{ old('email') }}" required autocomplete="email">
                    
                    @error('email')
                        <span class="invalid-feedback text-center my-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="{{__('Password')}}" required autocomplete="new-password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" name="password_confirmation" id="password-confirm" placeholder="{{__('Confirm Password')}}" required autocomplete="new-password">
                    </div>
                    @error('password')
                        <span class="invalid-feedback text-center my-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="subit" class="btn btn-primary btn-user btn-block">
                  {{__('Register')}}
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{route('password.request')}}">{{__('Forgot Your Password?')}}</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{route('login')}}">{{__('Login')}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection