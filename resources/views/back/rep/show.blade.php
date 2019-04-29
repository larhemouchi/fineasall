@extends('front.layouts.index')

@section('title')
{{ $rep->theatre->titre }}
@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> {{ $rep->theatre->titre }}</h3>
  <hr class="featurette-divider">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $rep->theatre->titre }} à {{ $rep->salle->nom }}</h5>

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


                @hasrole('regular')

                  <a href="{{ route( 'res.init', $rep->id ) }}" class="card-link">Resérver</a>


                @endhasrole

                



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