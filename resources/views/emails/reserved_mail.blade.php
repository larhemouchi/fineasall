@php

$total = 0;

@endphp

@foreach( $info as $k => $i )


@php

$total +=  $i->rep->prix ;

@endphp



@endforeach


@component('mail::message')
#Salam
<h1>Informations sur the reservations sur {{ config('app.name') }}.com</h1>



<p>tu a reservé {{ count( $info ) }} place{{ count( $info ) > 1 ? 's' : '' }} au prix de {{ $total }} € en total.</p>


<div class="row">
                <div class="col-12 table-responsive">
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

                    @foreach( $info as $k => $i )
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
                </div>


@component('mail::button', ['url' => 'http://127.0.0.1:8000/reps/'. $info[0]->rep->id])
Regarder la representation
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
