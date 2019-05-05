


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>{{ config('app.name') }}  </title>


    <!-- Bootstrap core CSS -->
<link href="{{ asset('/admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" >





    @yield('styles')


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/front/carousel.css" rel="stylesheet">
  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">






                    @if (Auth::check())
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/') }}">Home</a>
                      </li>
                      @can( 'add_theater' )
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('reps.create') }}">Creation, Representation</a>
                      </li>
                      @endcan
                    @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/home') }}">Home</a>
                      </li>

                    <li class="nav-item">
                          <a class="nav-link"  href="{{ url('/login') }}">Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/register') }}">Register</a>
                      </li>
                        
                        
                    @endif



      </ul>




{!! Form::open(['route' => 'theatres.search', 'method' => 'post', 'class' => 'form-inline mt-2 mt-md-0']) !!}

            <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-item" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li class="nav-item" >
                                        <a href="{{ route('users.res', Auth::id()) }}">
                                          Mes reservations
                                        </a>

                                    </li>

                                    <li class="nav-item" >
                                        <a href="{{ route('users.mod-info', Auth::id()) }}">
                                          Modifier mes informations
                                        </a>

                                    </li>
                                    <li class="nav-item" >
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>






    </div>
  </nav>
</header>

<main role="main">



  @yield('content')

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="{{ asset('/admin/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.js') }}"></script>



@yield('scripts')



</body>
</html>