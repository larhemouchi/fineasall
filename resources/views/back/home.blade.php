@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="card col-xs-12">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">

                    @foreach($users as $user)
                        <li><a href="{{route('users.mod-info', $user->id)}}">modify user {{ $user->email }}</a>  <a href="{{route('users.res', $user->id)}}">ses reservations</a></li>
                    @endforeach
                </p>


              </div>
            </div>


            <div class="card col-xs-12">
              <div class="card-body">
                <h5 class="card-title">Theatres</h5>

                <p class="card-text">

                    @foreach($theatres as $theatre)
                        <li><a href="{{route('theatres.show', $theatre->slug )}}">{{ $theatre->titre }}</a></li>
                    @endforeach
                </p>


              </div>
            </div>

          </div>


          <div class="card col-xs-12">
              <div class="card-body">
                <h5 class="card-title">Salles</h5>

                <p class="card-text">

                    @foreach($salles as $salle)
                        <li><a href="{{route('salles.show', $salle->slug )}}"></a></li>
                    @endforeach
                </p>


              </div>
            </div>

          </div>

          <div class="card col-xs-12">
              <div class="card-body">
                <h5 class="card-title">Representations</h5>

                <p class="card-text">

                    @foreach($reps as $rep)
                        <li><a href="{{route('reps.show', $rep->slug )}}">{{ $rep->titre() }} </a></li>
                    @endforeach
                </p>


              </div>
            </div>

          </div>



          <div class="card col-xs-12">
              <div class="card-body">
                <h5 class="card-title">Reservations</h5>

                <p class="card-text">

                    @foreach($res as $re )
                        <li>{{ $re->titre() }}</li>
                    @endforeach
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