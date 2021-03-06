

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

            <div class="lowin-box lowin-register">
                <div class="lowin-box-inner">


                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <p>Let's create your account</p>
                        <div class="lowin-group {{ $errors->get('email')? 'is-invalid' : '' }}">

                            <label>Email</label>
                            <input type="email" autocomplete="email" name="email" class="lowin-input" value="{{old('email')}}">
                            @if($errors->get('email'))
                            @foreach($errors->get('email') as $message)

                            {{$message}}
                            @endforeach

                            @endif
                        </div>
                        <div class="lowin-group">
                            <label>Password</label>
                            <input type="password" name="password" autocomplete="current-password" class="lowin-input">
                        </div>

                        <div class="lowin-group">
                            <label for="password-confirm">Confirmer Password</label>

                            <input id="password-confirm" type="password" class="lowin-input" name="password_confirmation" required>

                        </div>
                        <!-- Pseudo ????????? -->
                        <div class="lowin-group {{ $errors->get('pseudo')? 'is-invalid' : '' }}">
                            <label>pseudo</label>
                            <input type="text" name="pseudo" autocomplete="pseudo" class="lowin-input" value="{{old('pseudo')}}">
                            @if($errors->get('pseudo'))
                            @foreach($errors->get('pseudo') as $message)

                            {{$message}}
                            @endforeach

                            @endif
                        </div>
                        <div class="lowin-group {{ $errors->get('nom')? 'is-invalid' : '' }}">
                            <label>Nom</label>
                            <input type="text" name="nom" autocomplete="nom" class="lowin-input" value="{{old('nom')}}">

                            @if($errors->get('nom'))
                            @foreach($errors->get('nom') as $message)

                            {{$message}}
                            @endforeach

                            @endif
                        </div>
                        <div class="lowin-group {{ $errors->get('prenom')? 'is-invalid' : '' }}">
                            <label>Prenom</label>
                            <input type="text" name="prenom" autocomplete="prenom" class="lowin-input">
                            @if($errors->get('prenom'))
                                @foreach($errors->get('prenom') as $message)

                                {{$message}}
                                @endforeach

                            @endif 
                        </div>
                        <div class="lowin-group">
                            <label for="sex" class="col-md-4 control-label">Sex</label>
                            {{ Form::select('sex', [True => 'Homme', False => 'Femme' ], old('sex'), [ 'required' => true, 'class' => 'form-control lowin-input']) }}


                            @if ($errors->has('sex'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sex') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="lowin-group {{ $errors->get('tel')? 'is-invalid' : '' }}">
                            <label>telephone</label>
                            <input type="text" name="tel" autocomplete="tel" class="lowin-input">
                            @if($errors->get('tel'))
                            @foreach($errors->get('tel') as $message)

                            {{$message}}
                            @endforeach

                            @endif
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

        </footer>
    </div>
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
    Auth.init({
        login_url: '#register',
        forgot_url: '#forgot'
    });
    </script>
</body>
</html>


