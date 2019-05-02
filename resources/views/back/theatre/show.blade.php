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
            <div class="card">
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