@extends('front.layouts.index')


@section('content')


  <hr class="featurette-divider">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $salle->nom }}</h5>

                

                <img class="img-fluid" src="{{ asset('uploads/salle/'. Decore::salle_theatre('random') ) }}" />

                <hr />

                <p class="card-text">




                  {{ $salle->adress }}


                </p>



                @hasrole('super_admin')

                <a href="{{ route( 'salles.edit', $salle->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['salles.destroy', $salle->id]]) !!}

                {{ csrf_field() }}

                <button class="card-link">Suprimer</button>

                {!! Form::close() !!}

                @endhasrole

                



              </div>
            </div>

          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection



@section('scripts')

<script>
</script>


@endsection






