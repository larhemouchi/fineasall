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

            {!! Form::model($rep, ['route' => ['reps.update', $rep->id ], 'method' => 'PUT' ]) !!}
            {{ csrf_field() }}

            <div class="form-group">
                  <label for="prix">Prix</label>

                  {{ Form::number( 'prix', null, old('prix'), ['required' => true, 'class' => 'form-control']) }}

                </div>

                  <div class="form-group">
            <label for="theatre">Theatre</label>

            {{ Form::select('theatre_id', $theatres, old('theatre'), ['required' => true, 'class' => 'form-control']) }}

          </div>

          <div class="form-group">
            <label for="salle">Salle</label>

            {{ Form::select('salle_id', $salles, old('salle'), ['required' => true, 'class' => 'form-control']) }}

          </div>


          <div class="form-group">
            <label for="salle">Date heures</label>

            {{ Form::input('dateTime-local', 'dateheure', $dt, array('class' => 'form-control')) }}

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