@extends('front.layouts.index')

@section('title')
{{ $theatre->titre }}
@endsection

@section('content')
  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> {{ $theatre->titre }}</h3>
  <hr class="featurette-divider">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

          <div class="row">
            <div class="card col-md-6">
              <div class="card-body">
                <h5 class="card-title"><a href="{{ route('theatres.show', $theatre->slug)}}">{{ $theatre->titre }}</a></h5>

                <hr />

                <img class="img-fluid" src="{{ asset( Img::noimg('theatre', $theatre->img ) ) }}" />

                <hr />

                <p class="card-text">

                	


                  {{ $theatre->desc }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'theatres.edit', $theatre->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['theatres.destroy', $theatre->id]]) !!}

                {{ csrf_field() }}

                <button class="card-link">Suprimer</button>

                {!! Form::close() !!}

                @endhasrole

                



              </div>
            </div>

            <div class="col-md-6">

            <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Salle</th>
            <th scope="col">Adress</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
          </tr>
        </thead>
        <tbody>


        @foreach( $theatre->reps as $rep)

        <tr>
            <th scope="row"><a class="btn btn-primary" href="{{ route( 'res.init', $rep->id ) }}" role="button">Reserver</a></th>
            <td>{{  $rep->salle->nom   }}</td>
            <td>{{  $rep->salle->adress   }}</td>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('l jS \\of F Y ')   }}</td>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('H:i')   }}</td>
          </tr>


        @endforeach

        </tbody>
      </table>



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