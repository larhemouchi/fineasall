<!DOCTYPE html>
<html>
<head>
	<title>Tickets</title>
	
</head>
<body>


	@forelse($info as $k => $i)


	<h1>{{ 'Siege N° : ' .$i->siege->num }}, {{ 'Siege category : '. $i->siege->cat->nom }}</h1>

	

	<p>{{ 'Par : ' .$i->user->nom.' '.$i->user->prenom }}.</p>

	<p>{{ 'Pour voire le théatre : ' .$i->rep->theatre->titre }} </p>
	<p>{{ ' à la salle : '.$i->rep->salle->nom }} </p>
	<p>à l'heure : <span> {{ Carbon::parse($i->rep->dateheure)->diffForHumans() }} </span></p>

	



	@if( count($info) != $loop->index +1 )

	<pagebreak>

	@endif
		

	


	@empty

	ERROR


	@endforelse



</body>
</html>










