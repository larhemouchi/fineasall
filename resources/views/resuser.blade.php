@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')
<table class="table">
                    <ul>



                      

                        <head>
    <tr>
        <th>Numero de Siege</th>
        <th>Titre de representation</th>
        <th>Nom de salle </th>
        <th>Prix de place </th>
        <th>Heure de representation</th>
       
        
    </tr>
</head>
<body>
    
       @forelse( Auth::user()->res as $res )
    <tr>
        <td>{{$res->siege->num}}</td>
        <td>{{$res->rep->theatre->titre}}</td>
        <td>{{$res->rep->salle->nom}}</td>
        <td>{{$res->rep->prix }}</td>
        <td>{{$res->rep->dateheure }}</td>
       
        <td>

</tr>



                        
                        @empty
                     

                        @endforelse


                        </ul>
</table>

@endsection



@section('scripts')

<script>



</script>


@endsection