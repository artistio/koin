@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">{{ __('Reset Password') }}</h5>
            @if($errors->any())
              <div class="alert alert-danger">{{$errors->first()}}</div>
            @elseif (session('status'))
              <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
            <form class="form-signin" method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">{{ __('E-Mail Address') }}</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">{{ __('Send Password Reset Link') }}</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
