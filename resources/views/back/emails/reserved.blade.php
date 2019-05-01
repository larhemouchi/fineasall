<h1> Informations sur the reservations sur {{ config('app.name') }}.com </h1>
@php

$total = 0;

@endphp

@foreach( $info as $k => $i )


@php

$total +=  $i->rep->prix ;

@endphp



@endforeach



<p> tu a reservé {{ count( $info ) }} place{{ count( $info ) > 1 ? 's' : '' }} au prix de {{ $total }} € en total </p>
@foreach( $info as $k => $i )


<table class="table table-striped">
    <thead>
    <tr>
        <th>Theatre</th>
        <th>Salle</th>
        <th>Category Siege</th>
        <th>Numero siege</th>
        <th>Prix</th>
    </tr>
    </thead>
    <tbody>

    @foreach( $info as $key => $i )
    <tr>

        <td>{{ $i->rep->theatre->titre }}</td>
        <td>{{ $i->rep->salle->nom }}</td>
        <td>{{ $i->siege->cat->nom  }}</td>
        <td>{{ $i->siege->num  }}</td>
        <td>{{ $i->rep->prix }}</td>

    </tr>
    @endforeach

    </tbody>
</table>



@endforeach