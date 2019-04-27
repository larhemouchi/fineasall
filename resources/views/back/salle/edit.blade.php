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
                <h5 class="card-title">Card title</h5>

                <p class="card-text">


                  {!! Form::model($salle, ['route' => ['salles.update', $salle->id ], 'method' => 'PUT' ]) !!}

                  {{ csrf_field() }}

				  <div class="form-group">
            <label for="nom">nom</label>

            {!! Form::text('nom', null, ['class' => 'form-control', 'id' => 'nom' ]) !!}

          </div>
          <div class="form-group">
            <label for="adress">adress</label>

            {!! Form::textarea('adress', null, ['class' => 'form-control', 'id' => 'adress' ]) !!}

          </div>



				  <button type="submit" class="btn btn-primary">Submit</button>



                  {!! Form::close() !!}


                </p>


              </div>
            </div>

          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection