@hasrole('super_admin')

    @php
        $upper_layout = 'back';
    @endphp


@else

    @php
        $upper_layout = 'front';
    @endphp


@endhasrole

@extends( $upper_layout.'.layouts.index' )

@section('title')
Modifier les informations dun utilisateur
@endsection

@section('content')


<hr class="featurette-divider">

<h2 class="text-center">Les informations personnelles</h2>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="hidden-xs col-md-4"></div>
          <div class="col-xs-12 col-md-4">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Informations personnelles</h5>

                <p class="card-text">


                  {!! Form::model($user, ['route' => ['users.mod-info', $user->id ], 'method' => 'PUT' ]) !!}

                  {{ csrf_field() }}





				  <div class="form-group">
                        <label for="pseudo">pseudo</label>

                        {!! Form::text('pseudo', Crypt::decryptString( $user->pseudo ) , ['class' => 'form-control', 'id' => 'pseudo' ]) !!}

                    </div>


                    <div class="form-group">
                        <label for="nom">nom</label>

                        {!! Form::text('nom', null, ['class' => 'form-control', 'id' => 'nom' ]) !!}

                    </div>

                    <div class="form-group">
                        <label for="prenom">prenom</label>

                        {!! Form::text('prenom', null, ['class' => 'form-control', 'id' => 'prenom' ]) !!}

                    </div>

                    <div class="form-group">
                        <label for="email">email</label>

                        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email' ]) !!}

                    </div>

                    <div class="form-group">
                        <label for="tel">tel</label>

                        {!! Form::tel('tel', null, ['class' => 'form-control', 'id' => 'tel' ]) !!}

                    </div>

                    <div class="form-group">
                        <label for="sex">sex</label>

                    {{ Form::select('sex', [True => 'Homme', False => 'Femme' ], old('sex'), ['Ton sex' => 'Ton sex', 'class' => 'form-control']) }}

                    </div>


				  <button type="submit" class="btn btn-primary">Submit</button>

<a href="{{url('/')}}" class="btn btn-warning">Retour</a>

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