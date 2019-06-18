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

                  <div class="form-group {{$errors->get('prix')? 'has-error' : ''}}   ">
                  <label for="prix">Prix</label>

                  {{ Form::number( 'prix', old('prix'), ['required' => true, 'class' => 'form-control']) }}
                  @if($errors->get('prix'))
                    @foreach($errors->get('prix') as $message)

                     {{$message}}
                    @endforeach

                  @endif
                </div>



				  <div class="form-group {{$errors->get('theatre')? 'has-error' : ''}}  ">
				    <label for="theatre">Theatre</label>

				    {{ Form::select('theatre_id', $theatres, old('theatre'), ['required' => true, 'class' => 'form-control']) }}

@if($errors->get('theatre'))
            @foreach($errors->get('theatre') as $message)

             {{$message}}
            @endforeach

            @endif
				  </div>


			  <div class="form-group {{$errors->get('salle')? 'has-error' : ''}} ">
            <label for="salle">Salle</label>

            {{ Form::select('salle_id', $salles, old('salle'), ['required' => true, 'class' => 'form-control']) }}


@if($errors->get('salle'))
            @foreach($errors->get('salle') as $message)

             {{$message}}
            @endforeach

            @endif
          </div>


          <div class="form-group">
            <label for="date">Date</label>


            {{ Form::input('date', 'date', $dt, array('class' => 'form-control')) }}

          </div>


          <div class="form-group">
            <label for="heures">Heures</label>

                {{ Form::select('heures[]', Configuration::hours() , null , ['required' => true, 'class' => 'form-control' , 'id' => 'heures', 'multiple' => true ]) }}


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