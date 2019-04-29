@extends('front.layouts.index')


@section('content')



  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>


      @forelse($reps as $rep)
      <li data-target="#myCarousel" data-slide-to="{{ $loop->index + 1 }}" class="{{$loop->first?'active': ''}}"></li>


      @empty

      @endforelse


    </ol>


      <div class="carousel-inner">
      <div class="carousel-item active">


        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#60a3bc"/></svg>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>WELCOM TO ROXY THEATRE.</h1>
            <p>La meilleur platforme des theatre disponible au resaux.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ Auth::check() ? route('home') : route('register') }}" role="button">{{ Auth::check() ? 'Entrer' : "S'enregistrer" }}</a></p>
          </div>
        </div>
      </div>


    @forelse($reps as $rep)
    <div class="carousel-inner">
      <div class="carousel-item">
      	@if($rep->theatre->img != '')
        	<img class="img-fluid" src="{{ asset('uploads/theatre/'. $rep->theatre->img) }}" />
        @else

        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="{{ Decore::colors('random') }}"></rect><text x="50%" y="50%" fill="{{ Decore::colors('random') }}" dy=".3em">{{ $rep->theatre->titre }}</text></svg>

        @endif
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>{{ $rep->theatre->titre }} à {{ $rep->salle->nom }}</h1>
            <p>{{ $rep->prix }} €  {{ \Carbon\Carbon::parse( $rep->dateheure )->diffForHumans() }}</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('reps.show', $rep->id) }}" role="button">Voire</a></p>
          </div>
        </div>
      </div>
      @empty



      @endforelse
      
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!-- CARDS
  ================================================== -->
<div class="container">
	<h3 class="text-center col-xs-12"> Les Derniers Théatres</h3>
<div class="row">

	
	@forelse( $theatres as $theatre )
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          	@if($theatre->img != '')
            	<img class="img-fluid" src="{{ asset('uploads/theatre/'. $theatre->img) }}" />
            @else

            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="{{ Decore::colors('random') }}"></rect><text x="50%" y="50%" fill="{{ Decore::colors('random') }}" dy=".3em">{{ $theatre->titre }}</text></svg>

            @endif
            <div class="card-body">
            	@if($theatre->img != '')
            	<p class="card-text">{{ $theatre->titre }}</p>
          		@endif
              <p class="card-text">{{ $theatre->desc }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('theatres.show', $theatre->slug) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  @can('modify_theater')
					  <a href="{{ route('theatres.edit', $theatre->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
				  @endcan
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

    @empty
        
    @endforelse

    @if( count($theatres) > 0  )
    	<div class="col-md-12">
    		<a href="{{ route('theatres.index') }}" type="button" class="btn btn-sm btn-outline-secondary  pull-right">Voire Tout</a>
    	</div>
    	
    @endif

</div>
</div>



    <hr class="featurette-divider">





<!-- CARDS
  ================================================== -->
<div class="container">
	<h3 class="text-center col-xs-12"> Les salles</h3>
<div class="row">

	
	@forelse( $salles as $salle )
        <div class="col-md-4">

          <div class="card mb-4 shadow-sm">

          	<img class="img-fluid" src="{{ asset('uploads/salle/'. Decore::salle_theatre('random') ) }}" />

          	{{-- 

          	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="{{ Decore::colors('random') }}"></rect><text x="50%" y="50%" fill="{{ Decore::colors('random') }}" dy=".3em">{{ $salle->nom }}</text></svg>

          	 --}}
            
            <div class="card-body">
              <p class="card-text">{{ $salle->adress }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('salles.show', $salle->slug) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  @can('modify_theater')
					  <a href="{{ route('salles.edit', $salle->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
				  @endcan
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

    @empty
        
    @endforelse

    @if( count($salles) > 0  )
    	<div class="col-md-12">
    		<a href="{{ route('salles.index') }}" type="button" class="btn btn-sm btn-outline-secondary  pull-right">Voire Tout</a>
    	</div>
    	
    @endif

</div>
</div>



    <hr class="featurette-divider">







<div class="container">
	<h3 class="text-center col-xs-12"> Les representations</h3>
<div class="row">

	
	@forelse( $reps as $rep )
        <div class="col-md-4">

          <div class="card mb-4 shadow-sm">
          	@if($rep->theatre->img != '')
        	<img class="img-fluid" src="{{ asset('uploads/theatre/'. $rep->theatre->img) }}" />
        @else

        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="{{ Decore::colors('random') }}"></rect><text x="50%" y="50%" fill="{{ Decore::colors('random') }}" dy=".3em">{{ $rep->theatre->titre }}</text></svg>

        @endif

            <div class="card-body">
              <p class="card-text">{{ $rep->prix }} €  {{ \Carbon\Carbon::parse( $rep->dateheure )->diffForHumans() }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('reps.show', $rep->id) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  @can('modify_theater')
					  <a href="{{ route('reps.edit', $rep->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
				  @endcan
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

    @empty
        
    @endforelse

    @if( count($reps) > 0  )
    	<div class="col-md-12">
    		<a href="{{ route('reps.index') }}" type="button" class="btn btn-sm btn-outline-secondary  pull-right">Voire Tout</a>
    	</div>
    	
    @endif

</div>
</div>



    <hr class="featurette-divider">





@endsection