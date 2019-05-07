@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les pieces de théatre</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">

            @forelse( $theatres as $theatre )
          <div class="col-md-6">



            <div class="card">
              <div class="card-body">






                <h5 class="card-title">{{ $theatre->titre }}</h5>



              <img class="img-fluid" src="{{ asset( Img::noimg( 'theatre', $theatre->img) ) }}" />


                <p class="card-text">


                  {{ $theatre->desc }}


                </p>

                @hasrole('super_admin')

               

                

               


                {!! Form::open(['method' => 'DELETE', 'route' => ['theatres.destroy', $theatre->id]]) !!}

                {{ csrf_field() }}

 <a href="{{ route( 'theatres.edit', $theatre->id ) }}" class=" btn btn-success">Modifier</a>
                <button class=" btn btn-danger">Suprimer</button>

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


            @if( count($theatres) > 0  )
              {!! $theatres->links() !!}
            @endif()


        </div>
        <!-- /.row -->
      </div><!-- /.container -->


@endsection



@section('scripts')

<script>



</script>


@endsection