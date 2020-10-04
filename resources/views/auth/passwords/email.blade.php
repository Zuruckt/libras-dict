@extends('layouts.auth')

@section('content')
    <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{__('Forgot Your Password?')}}</h1>
                    <p>Insira seu email para que possamos enviar um link para redefinir sua senha.</p>
                  </div>
                  <form class="user" method="POST" action="{{ route('password.email') }}">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="{{__('E-Mail Address')}}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback text-center my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      {{ __('Send') }}
                    </button>
                  </form>
                  <hr>
                <div class="text-center">
                    <a class="small" href="{{route('register')}}">{{__('Register')}}</a>
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

    </div>

  </div>
@endsection