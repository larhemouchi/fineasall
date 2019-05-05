@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')




<div class="container">
  <h3 class="text-center col-xs-12"> Les representations</h3>
<div class="row">
@forelse( $reps as $rep )


    <div class="col-xs-12">
    
    <h2 align="center"><strong>{{$rep->theatre->titre}} à {{$rep->salle->nom}}</strong></h2>

    <div class="row">
    <div class="col-sm-6">
      
      <img src="{{ asset( Img::noimg( 'theatre' , $rep->theatre->img) ) }}" alt="-" class="img-fluid" class="pb-15">
    </div>






      <div class="col-sm-6">

      <p>{{ $rep->theatre->desc }}</p>

      </div>

      </div>



      <div class="row">


      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>



      </div



    
    </div>




@empty

<div class="alert alert-warning" >Empty</div>
@endforelse

</div>






@endsection



@section('scripts')

<script>



</script>


@endsection