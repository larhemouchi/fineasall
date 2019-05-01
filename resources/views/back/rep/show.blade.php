@extends('front.layouts.index')



@section('content')

  <br class="featurette-divider">

 
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $rep->theatre->titre }}
                </h5>


                

                <img class="img-fluid" src="{{ asset('uploads/theatre/'. $rep->theatre->img) }}" />

                <hr />

                <p class="card-text">


                  prix : {{ $rep->prix }} € à{{ $rep->dateheure }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'reps.edit', $rep->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['reps.destroy', $rep->id]]) !!}


                {{ csrf_field() }}

                <button class="card-link">Suprimer</button>

                {!! Form::close() !!}


                @endhasrole


                @if( Auth::check() )

                  @if( Auth::id() != 1 )

                  <a href="{{ route( 'res.init', $rep->id ) }}" class="card-link">Resérver</a>

                  @endif

                @endif


                

                



              </div>
            </div>

          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->





      </div><!-- /.container -->


@endsection



@section('scripts')

<script>



</script>


@endsection