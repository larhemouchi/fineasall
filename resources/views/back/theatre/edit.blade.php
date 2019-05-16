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


                  {!! Form::model($theatre, ['route' => ['theatres.update', $theatre->id ], 'method' => 'PUT' , 'files' => true]) !!}

                          {{ csrf_field() }}





				  <div class="form-group @if($errors->get('titre')) has-error @endif">
				    <label for="titre">Titre</label>

				    {!! Form::text('titre', null, ['class' => 'form-control', 'id' => 'titre' ]) !!}
@if($errors->get('titre'))
            @foreach($errors->get('titre') as $message)

             {{$message}}
            @endforeach

            @endif
				  </div>
				  <div class="form-group  @if($errors->get('desc')) has-error @endif">
				    <label for="desc">Description</label>

				    {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc' ]) !!}
@if($errors->get('desc'))
            @foreach($errors->get('desc') as $message)

             {{$message}}
            @endforeach

            @endif
				  </div>


          <div class="form-group">

            @if($theatre->img != '')

            <img class="img-fluid" src="{{ asset('uploads/theatre/'. $theatre->img) }}" />

            @endif
            <hr />
            <label for="img">IMG</label>

            {!! Form::file('img', ['class' => 'form-control', 'id' => 'img' ]) !!}

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