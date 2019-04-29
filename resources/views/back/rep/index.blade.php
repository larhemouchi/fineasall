@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les representaions</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">

            @forelse( $reps as $rep )
          <div class="col-md-6">



            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $rep->theatre->titre }} à {{ $rep->salle->nom }}</h5>

                

 <p class="card-text">
<img class="img-fluid" src="{{ asset('uploads/theatre/'. $rep->theatre->img) }}" />

                  {{ $rep->dateheure }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'reps.edit', $rep->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['reps.destroy', $rep->id]]) !!}

                {{ csrf_field() }}

                <button class="card-link">Suprimer</button>

                {!! Form::close() !!}

                @endhasrole

                



              </div>
            </div>





          </div>
          <!-- /.col-md-6 -->

            @empty

            <div class="alert alert-warning" role="alert">
              EMPTY
            </div>
          
            @endforelse


            @if( count($reps) > 0  )
              {!! $reps->links() !!}
            @endif()


        </div>
        <!-- /.row -->
      </div><!-- /.container -->


@endsection



@section('scripts')

<script>



</script>


@endsection