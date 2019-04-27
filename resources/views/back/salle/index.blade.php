@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les salles</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">

            @forelse( $salles as $salle )
          <div class="col-md-6">



            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $salle->nom }}</h5>

                <p class="card-text">


                  {{ $salle->adress }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'salles.edit', $salle->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['salles.destroy', $salle->id]]) !!}

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


            @if( count($salles) > 0  )
              {!! $salles->links() !!}
            @endif()


        </div>
        <!-- /.row -->
      </div><!-- /.container -->


@endsection



@section('scripts')

<script>



</script>


@endsection