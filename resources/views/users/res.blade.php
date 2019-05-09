
@extends($upper_layout.'.layouts.index')
@section('content')

<hr class="featurette-divider">
<h3 class="text-center">Mes réservations</h3>
<hr class="featurette-divider">

<div class="table-responsive ">
  <table class="table table-sm">
    <thead>
        <tr>
          <th width="20%">
             Numero de Siege
         </th>
         <th width="15%">
            Titre de representation
        </th>
        <th width="35%">
          Nom de salle
      </th>
      <th width="20%">
         Prix de place
     </th>
     <th width="15%">
        Heure de representation
    </th>

    <th class="hidden-xs" width="15%">
        &nbsp;
    </th>
    
</tr>  </thead> 

<tbody>
    @forelse( Auth::user()->res as $res )
    <tr>
        <td>{{$res->siege->num}}</td>
        <td>{{$res->rep->theatre->titre}}</td>
        <td>{{$res->rep->salle->nom}}</td>
        <td>{{$res->rep->prix }}</td>
        <td>{{$res->rep->dateheure }}</td>
        
        
    </tr>
    @empty

    @endforelse


    

</tbody> 
</table>






</div>
</div>           
</div>
</div>
@endsection
