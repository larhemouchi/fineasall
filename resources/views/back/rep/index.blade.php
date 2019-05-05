@extends('front.layouts.index')

@section('title')
Toutes les representations
@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les representations</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">

            @forelse( $reps as $rep )
          <div class="col-md-6">



            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $rep->theatre->titre }} à {{ $rep->salle->nom }}</h5>
                <div class="row">
                <div class="col-xs-12">
                  <div class="row">

                    <div class="col-md-6">
                    <h3>Image du théatre</h3>
                      <div class="align-middle">
                      <img class="img-fluid" src="{{ asset( Img::noimg('theatre', $rep->theatre->img)  ) }}" />
                      </div>
                    </div>
                    <div class="col-md-6">
                    <h3>Image de la salle</h3>
                    <div class="align-middle">
                      <img class="img-fluid align-middle" src="{{ asset('uploads/salle/'. Decore::salle_theatre('random') ) }}" />
                    </div>
                    </div>


                  </div>

                
                
                </div>
                

                </div>

                <p class="card-text">



                  {{ $rep->salle->adress }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'salles.edit', $rep->id ) }}" class="card-link">Modifier</a>

                     {!! Form::open(['method' => 'DELETE', 'route' => ['salles.destroy', $rep->id]]) !!}

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