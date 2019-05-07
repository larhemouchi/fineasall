@extends('front.layouts.index')



@section('content')

  <br class="featurette-divider">


      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $rep->theatre->titre }}
                </h5>






                <img class="img-fluid" src="{{ asset( Img::noimg( 'theatre', $rep->theatre->img )  ) }}" />

                <hr />

                <p class="card-text">


                  prix : {{ $rep->prix }} € Le {{  \Carbon\Carbon::parse($rep->dateheure)->format('l jS \\of F Y ')   }} à {{  \Carbon\Carbon::parse($rep->dateheure)->format('H:i')   }}



                </p>

                @hasrole('super_admin')

               


                {!! Form::open(['method' => 'DELETE', 'route' => ['reps.destroy', $rep->id]]) !!}

                {{ csrf_field() }}

 <a href="{{ route( 'reps.edit', $rep->id ) }}" class="btn btn-success">Modifier</a>
                <button class="btn btn-danger">Suprimer</button>

                {!! Form::close() !!}



                @endif

                @hasrole('regular')






                    <a href="{{ route( 'res.init', $rep->id ) }}" class="card-link">Resérver</a>








                @endif











              </div>
            </div>

          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->





      </div><!-- /.container -->


@endsection



@section('scripts')

<script>



</script>


@endsection
