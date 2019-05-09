


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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
 
    <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{'/'}}"> Roxy Theatre </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">






                     
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/') }}">Home</a>
                      </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/theatres') }}">Theatres</a>
                      </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/reps') }}">Representations</a>
                      </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/salles') }}">Salles</a>
                      </li>

                  
                        
                



      </ul>


<ul class="nav navbar-nav ml-auto">
{!! Form::open(['route' => 'models.search', 'method' => 'post', 'class' => 'form-inline mt-2 mt-md-0']) !!}
{{ csrf_field() }}
<div class="input-group mb-2 mr-sm-2">
<div class="input-group-prepend">
<input name="search" class="form-control" type="text" placeholder="Search" aria-label="Search">

    
    </div>
    {{ Form::select('model', ['reps'=>'representations','theatres' => 'theatre', 'salles' => 'salle' ], 'theatres', ['class'=>'form-control']) }}

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>


  </div>
  </form>

           



               <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav mr-auto">
          
          
        </ul>
         <ul class="nav navbar-nav ml-auto">
            @if (Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}"><span class="fas fa-user"></span> Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}"><span class="fas fa-sign-in-alt"></span> Login</a>
      </li>
    @else
         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Profile </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="{{ route('users.mod-info', Auth::id()) }}">Mon compte</a>
           <a class="dropdown-item" href="{{ route('users.res', Auth::id()) }}">Mes réservations</a>
          <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        </div>
      </li>
      </li>
      @endif
    </ul>

      </div>



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
    <p>&copy; 2019 Company Roxy-Theatre, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="{{ asset('/admin/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.js') }}"></script>



@yield('scripts')




</html>