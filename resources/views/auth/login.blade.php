@extends('layouts.app')

@section('content')

  <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <div class="lowin">
        <div class="lowin-brand">
            <img src="kodinger.jpg" alt="logo">
        </div>
        <div class="lowin-wrapper">
            <div class="lowin-box lowin-login">
                <div class="lowin-box-inner">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        
                        <p>Sign in to continue</p>
                        <div class="lowin-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email <a href="#" class="login-back-link">Sign in?</a></label>
      <input type="email" autocomplete="email" name="email" value="{{ old('email') }}" class="lowin-input" required autofocus>
  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                @endif
                        </div>
                        <div class="lowin-group password-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password <a href="#" class="forgot-link">Forgot Password?</a></label>
                            <input type="password" name="password" id="password" autocomplete="current-password" class="lowin-input" required>
                             @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <button class="lowin-btn login-btn">
                            Sign In
                        </button>

                        <div class="text-foot">
                            Don't have an account? <a href="" class="register-link">Register</a>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    
        <footer class="lowin-footer">
            Design By <a href="http://fb.me/itskodinger">@itskodinger</a>
        </footer>
    </div>
  <script src="{{ asset('js/auth.js') }}"></script>
    
    <script>
        Auth.init({
            login_url: '#login',
            forgot_url: '#forgot'
        });
    </script>
        </div>
    </div>
</div>
@endsection
