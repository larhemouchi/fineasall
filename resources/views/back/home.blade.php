@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">



          <div class="col-xs-12">
              <div class="card col-xs-12" style="width: 60rem;">
                <div class="card-body">
                  <h5 class="card-title">Admins</h5>

                  <p class="card-text">
                      <ul>
                      @foreach($admins as $admin)
                          <li class="mb-4">{{ $admin->email }} | <a class="btn btn-warning" href="{{route('users.downgrade', $admin->id)}}"> Dégradation </a></li>
                      @endforeach
                      </ul>
                  </p>


                </div>
              </div>

          </div>




          <div class="col-xs-12">
            <div class="card col-xs-12" style="width: 60rem;">
              <div class="card-body">
                <h5 class="card-title">Users</h5>

                <p class="card-text">
                <ul>
                    @foreach($users as $user)
                        <li class="mb-4"><a class="btn btn-primary" href="{{route('users.mod-info', $user->id)}}">modifier le user {{ $user->email }}</a> | <a class="btn btn-success" href="{{route('users.res', $user->id)}}">ces reservations</a> | <a class="btn btn-warning" href="{{route('users.upgrade', $user->id)}}"> Mise a niveaux </a></li>
                    @endforeach
                    </ul>
                </p>


              </div>
            </div>

          </div>

          <div class="col-xs-12">
            <div class="card col-xs-12" style="width: 60rem;">
              <div class="card-body">
                <h5 class="card-title">Theatres</h5>

                <p class="card-text">
                <ul>
                    @foreach($theatres as $theatre)
                        <li><a href="{{route('theatres.show', $theatre->slug )}}">{{ $theatre->titre }}</a></li>
                    @endforeach
                    </ul>
                </p>


              </div>
            </div>

          </div>


          <div class="col-xs-12">

          <div class="card col-xs-12" style="width: 60rem;">
              <div class="card-body">
                <h5 class="card-title">Representations</h5>

                <p class="card-text">
                <ul>
                    @foreach($reps as $rep)
                        <li><a href="{{route('reps.show', $rep->slug )}}">{{ $rep->titre() }} </a></li>
                    @endforeach
                    </ul>
                </p>


              </div>
            </div>

          </div>


          <div class="col-xs-12">
          <div class="card col-xs-12" style="width: 60rem;">
              <div class="card-body">
                <h5 class="card-title">Reservations</h5>

                <p class="card-text">
                <ul>
                    @foreach($res as $re )
                        <li>{{ $re->titre() }}</li>
                    @endforeach
                    </ul>
                </p>


              </div>
            </div>

          </div>


          <div class="col-xs-12">
                <div class="card col-xs-12" style="width: 60rem;">
              <div class="card-body">
                <h5 class="card-title">Salles</h5>

                <p class="card-text">
                <ul>
                    @foreach($salles as $salle)
                        <li><a href="{{route('salles.show', $salle->slug )}}"> {{ $salle->nom }} </a></li>
                    @endforeach
                    </ul>
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