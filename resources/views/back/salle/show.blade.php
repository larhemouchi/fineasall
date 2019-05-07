@extends('front.layouts.index')


@section('content')


  </br>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            </br>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><strong>Nom de la salle : </strong> {{ $salle->nom }}</h5>

                

                <img class="img-fluid" src="{{ asset('uploads/salle/'. Decore::salle_theatre($salle->id) ) }}" />

                <hr />

                <p class="card-text">




                 <strong>Addresse :</strong> {{ $salle->adress }}


                </p>



                @hasrole('super_admin')
  {!! Form::open(['method' => 'DELETE', 'route' => ['salles.destroy', $salle->id]]) !!}
                {{ csrf_field() }}

  <a href="{{ route( 'salles.edit', $salle->id ) }}" class="btn btn-success">Modifier</a>
                <button class=" btn btn-danger">Suprimer</button>

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






