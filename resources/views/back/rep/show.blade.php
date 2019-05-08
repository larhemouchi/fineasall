@extends('front.layouts.index')

@section('title')
{{ $rep->theatre->titre }}
@endsection

@section('content')
  <hr class="featurette-divider">
  <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
    <section class="container">
       <div class="row">
    <div class="col-sm-4">
 <h3 class="text-center"><strong> {{ $rep->theatre->titre }} </strong> </h3>

                <img class="img-fluid" width="480" height="480" src="{{ asset( Img::noimg( 'theatre', $rep->theatre->img )  ) }}" />
 </div>
<div class="col-sm-1">
    </div>
    <div class="col-sm-7">
       <fieldset>
            <p>
        </p> &nbsp; </p>

{{ $rep->theatre->desc }}
        

    
     </fieldset>
  </div></div>
  <div class="table-responsive ">
      <table class="table table-striped table-condensed">
        <tbody><tr>
          <th width="25%">
            Date
          </th>
          <th width="15%">
            Heure
          </th>
          <th width="35%">
          Addresse
          </th>
            <th width="20%">
            Salle
          </th>
          <th width="15%">
            Prix
          </th>

          <th class="hidden-xs" width="15%">
            &nbsp;
          </th>
          
        </tr>   

      

        <tr>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('l jS \\of F Y ')   }}</td>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('H:i')   }}</td>
            <td>{{  $rep->salle->adress   }}</td>
            <td>{{  $rep->salle->nom   }}</td>
            <td>{{  $rep->prix   }}</td>
            
         @if(\Auth::check())
            <th scope="row"><a class="btn btn-primary" href="{{ route( 'res.init', $rep->id ) }}" role="button">Reserver</a></th>
            @else
            
            <th scope="row"><a class="btn btn-primary" href="{{ route( 'login') }}" role="button">Se connecter</a></th>
            @endif
                
          </tr>


      

        </table></div> 
                     @hasrole('super_admin')

               


                {!! Form::open(['method' => 'DELETE', 'route' => ['reps.destroy', $rep->id]]) !!}

                {{ csrf_field() }}

 <a href="{{ route( 'reps.edit', $rep->id ) }}" class="btn btn-success">Modifier</a>
                <button class="btn btn-danger">Suprimer</button>

                {!! Form::close() !!}



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
