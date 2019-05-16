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


                  {!! Form::open(['route' => ['salles.store' ], 'method' => 'POST' ]) !!}

                  {{ csrf_field() }}

				  <div class="form-group @if($errors->get('nom')) has-error @endif">
				    <label for="nom">nom</label>

				    {!! Form::text('nom', null, ['class' => 'form-control', 'id' => 'nom' ]) !!}
@if($errors->get('nom'))
            @foreach($errors->get('nom') as $message)

             {{$message}}
            @endforeach

            @endif
				  </div>
				  <div class="form-group @if($errors->get('adress')) has-error @endif">
				    <label for="adress">adresse</label>

				    {!! Form::textarea('adress', null, ['class' => 'form-control', 'id' => 'adress' ]) !!}
@if($errors->get('adress'))
            @foreach($errors->get('adress') as $message)

             {{$message}}
            @endforeach

            @endif
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