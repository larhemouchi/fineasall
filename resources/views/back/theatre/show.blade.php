@extends('front.layouts.index')

@section('title')
{{ $theatre->titre }}
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
 <h3 class="text-center"><strong> {{ $theatre->titre }} </strong> </h3>

      <img src="{{ asset( Img::noimg('theatre', $theatre->img ) ) }}" alt="-" width="380" height="480" class="pb-15">
            </a>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-7">
       <fieldset>
            <p>
        </p> &nbsp; </p>


        <p>  {{$theatre->desc}}<br></p><p>

    
     </fieldset>
  </div></div>
<hr id="dates">
      <h3>Les representations</h3>
    
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

        @foreach( $theatre->reps as $rep)

        <tr>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('l jS \\of F Y ')   }}</td>
            <td>{{  \Carbon\Carbon::parse($rep->dateheure)->format('H:i')   }}</td>
            <td>{{  $rep->salle->adress   }}</td>
            <td>{{  $rep->salle->nom   }}</td>
            <td>{{  $rep->prix   }}</td>
            
            
            <th scope="row"><a class="btn btn-primary" href="{{ route( 'res.init', $rep->id ) }}" role="button">Reserver</a></th>
          </tr>


        @endforeach

        </table></div>  

  <div class="text-left">
    <a href="{{url('/')}}" class="btn btn-primary btn-warning">Retour</a>
  </div>

</section>
<footer>
  <div class="container">
    <div class="row">
     
      <div class="col-md-8 text-right">
        <p>
          <br>
          <br>
           Powered by : <a target="_blank" href="https://www.roxy-theatre.be"> Roxy-théatre</a>
        </p>
      </div>
    </div>
  </div>
</footer>







</body>

@endsection



@section('scripts')

<script>



</script>


@endsection