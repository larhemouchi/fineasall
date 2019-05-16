@extends('back.layouts.index')

@section('title')
Modifier les informations d'un représentation
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





                  {!! Form::open(['route' => ['reps.store' ], 'method' => 'POST' ]) !!}
                  {{ csrf_field() }}

                  <div class="form-group @if($errors->get('prix')) has-error @endif   ">
                  <label for="prix">Prix</label>

                  {{ Form::number( 'prix', null, old('prix'), ['required' => true, 'class' => 'form-control']) }}
@if($errors->get('prix'))
            @foreach($errors->get('prix') as $message)

             {{$message}}
            @endforeach

            @endif
                </div>



				  <div class="form-group @if($errors->get('theatre')) has-error @endif  ">
				    <label for="theatre">Theatre</label>

				    {{ Form::select('theatre_id', $theatres, old('theatre'), ['required' => true, 'class' => 'form-control']) }}

@if($errors->get('theatre'))
            @foreach($errors->get('theatre') as $message)

             {{$message}}
            @endforeach

            @endif
				  </div>


			  <div class="form-group @if($errors->get('salle')) has-error @endif ">
            <label for="salle">Salle</label>

            {{ Form::select('salle_id', $salles, old('salle'), ['required' => true, 'class' => 'form-control']) }}


@if($errors->get('salle'))
            @foreach($errors->get('salle') as $message)

             {{$message}}
            @endforeach

            @endif
          </div>


          <div class="form-group @if($errors->get('dateheure')) has-error @endif ">
            <label for="dateheure">Date heures</label>

            {{ Form::input('dateTime-local', 'dateheure', $dt, array('class' => 'form-control')) }}
@if($errors->get('dateheure'))
            @foreach($errors->get('dateheure') as $message)

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

@section('scripts')
<script type="text/javascript" src="{{ asset('/application/js/coll_corr.js')}}"> 

</script>
@endsection