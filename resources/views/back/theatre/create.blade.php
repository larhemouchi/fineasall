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


                  {!! Form::open(['route' => ['theatres.store' ], 'method' => 'POST' ]) !!}

                  {{ csrf_field() }}

				  <div class="form-group">
				    <label for="titre">Titre</label>

				    {!! Form::text('titre', null, ['class' => 'form-control', 'id' => 'titre' ]) !!}

				  </div>
				  <div class="form-group">
				    <label for="desc">Description</label>

				    {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc' ]) !!}

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