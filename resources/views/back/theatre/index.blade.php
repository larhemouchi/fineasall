@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">

            @forelse( $theatres as $theatre )

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $theatre->titre }}</h5>

                <p class="card-text">


                  {{ $theatre->desc }}


                </p>

                @hasrole('super_admin')

                <a href="{{ route( 'theatres.edit', $theatre->id ) }}" class="card-link">Modifier</a>

                

                <hr />


                {!! Form::open(['method' => 'DELETE', 'route' => ['theatres.destroy', $theatre->id]]) !!}

                <button class="card-link">Suprimer</button>

                @endhasrole

                {!! Form::close() !!}



              </div>
            </div>

            @empty

            <div class="alert alert-warning" role="alert">
              EMPTY
            </div>

            @endforelse


            @if( count($theatres) > 0  )
              {!! $theatres->links() !!}
            @endif()

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