
@extends($upper_layout.'.layouts.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">





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
    
       @forelse( $user->res as $res )
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

                    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
