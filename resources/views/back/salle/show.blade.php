@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $salle->nom }}</h5>

                <p class="card-text">


                  {{ $salle->adress }}


                </p>

                <a href="{{ route( 'salles.sieges', $salle->slug ) }}" class="card-link">Voire sieges</a>

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