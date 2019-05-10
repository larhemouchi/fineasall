

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lowin</title>

    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>

<body>
    <div class="lowin">
        <div class="lowin-brand">

            <img class="img-fluid" src="{{ asset('uploads/login/kodinger.png') }}" alt="logo"> />
        </div>
        <div class="lowin-wrapper">
            <div class="lowin-box lowin-login">
                <div class="lowin-box-inner">
                 <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <p>Sign in to continue</p>
                    <div class="lowin-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email <a href="#" class="login-back-link">Sign in?</a></label>
                        <input type="email" autocomplete="email" name="email"value="{{ old('email') }}"
                        class="lowin-input" required autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="lowin-group password-group">
                        <label>Password <a href="#" class="forgot-link">Forgot Password?</a></label>
                        <input type="password" name="password" id="password" autocomplete="current-password" class="lowin-input" required >
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

        <div class="lowin-box lowin-register">
            <div class="lowin-box-inner">


                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <p>Let's create your account</p>
                    <div class="lowin-group">
                        <label>Email</label>
                        <input type="email" autocomplete="email" name="email" class="lowin-input">
                    </div>
                    <div class="lowin-group">
                        <label>Password</label>
                        <input type="password" name="password" autocomplete="current-password" class="lowin-input">
                    </div>


                    <div class="lowin-group">
                        <label for="password-confirm">Confirmer Password</label>

                        <input id="password-confirm" type="password" class="lowin-input" name="password_confirmation" required>
                        
                </div>
                <div class="lowin-group">
                    <label>pseudo</label>
                    <input type="text" name="pseudo" autocomplete="pseudo" class="lowin-input">
                </div>
                <div class="lowin-group">
                    <label>Nom</label>
                    <input type="text" name="nom" autocomplete="nom" class="lowin-input">
                </div>
                <div class="lowin-group">
                    <label>Prenom</label>
                    <input type="text" name="prenom" autocomplete="prenom" class="lowin-input">
                </div>
                <div class="lowin-group">
                    <label for="sex" class="col-md-4 control-label">Sex</label>
                    {{ Form::select('sex', [True => 'Homme', False => 'Femme' ], old('sex'), ['Ton sex' => 'Pick a size...', 'required' => true, 'class' => 'lowin-input']) }}


                    @if ($errors->has('sex'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sex') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="lowin-group">
                    <label>telephone</label>
                    <input type="text" name="tel" autocomplete="tel" class="lowin-input">
                </div>

                <button class="lowin-btn">
                    Sign Up
                </button>

                <div class="text-foot">
                    Already have an account? <a href="{{ route('login') }}" class="login-link">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="lowin-footer">
    Design By <a href="http://www.isfce.org">@RoxyTheatre</a>
</footer>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
<script src="{{ asset('js/auth.js') }}"></script>
<script>
Auth.init({
    login_url: '#login',
    forgot_url: '#forgot'
});
</script>
</body>
</html>


