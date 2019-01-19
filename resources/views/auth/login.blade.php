@extends('_layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">{{ __('Sign In') }}</h5>
          @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
          @endif
          <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputEmail">{{ __('E-Mail Address') }}</label>
            </div>

            <div class="form-label-group">
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <label for="inputPassword">{{ __('Password') }}</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
              <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('Sign In') }}</button>
            @if (Route::has('password.request'))
              <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
            @endif
            <hr class="my-4">
            <!--
            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
