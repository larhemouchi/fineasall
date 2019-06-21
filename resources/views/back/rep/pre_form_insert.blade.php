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


                  {!! Form::open(['route' => ['reps.insert' ], 'method' => 'POST',  ]) !!}
                  {{ csrf_field() }}






@foreach( range(1, $howmany ) as $i)


                  <div class="form-group">
                    <label for="prix">Prix</label>

                    <input name="{{ 'myForm[prix]['.$i.']' }}" value="{{ $price }}" type="number" required>


                  </div>


                  <div class="form-group">
                    <label for="prix">Theatre</label>

                    {{ Form::select('myForm[theatre_id]['.$i.']', $theatres, $theatre_selected , ['required' => true, 'class' => 'form-control']) }}


                  </div>



                  <div class="form-group">
                    <label for="prix">Salle</label>


                    {{ Form::select('myForm[salle_id]['.$i.']', $salles, $salle_selected , ['required' => true, 'class' => 'form-control']) }}



                  </div>



                <div class="form-group">
                  <label for="date">Date</label>


                  <input name="{{ 'myForm[date]['.$i.']' }}" type="date" value="{{ $dt }}" />




                </div>






                  <div class="form-group">
                    <label for="prix">Heures</label>


                    {{ Form::select('myForm[hours]['.$i.'][]', Configuration::hours() , $selected_times  , ['required' => true, 'class' => 'form-control' , 'multiple' => true ]) }}




                  </div>







@endforeach












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