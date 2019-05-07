@extends('front.layouts.index')

@section('title')
Toutes les representations
@endsection

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
              
            </div>
        </div>
    </div> 

    <div id="products" class="row view-group">
               @forelse( $reps as $rep )
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="img-fluid" src="{{ asset( Img::noimg('theatre', $rep->theatre->img)  ) }}" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                {{$rep->theatre->titre}}</h4>
                            <p class="group inner list-group-item-text">
                               {{$rep->theatre->desc}}</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        {{$rep->prix}} €</p>
                                </div>
                               
                                     @hasrole('super_admin')

                

                     {!! Form::open(['method' => 'DELETE', 'route' => ['reps.destroy', $rep->id]]) !!}
<a href="{{ route( 'reps.edit', $rep->id ) }}" class="btn btn-success">Modifier</a>
                <button class="btn btn-danger">Suprimer</button>

                {!! Form::close() !!}

                @endhasrole

                
                            </div>
                        </div>
                    </div>
                </div>
                 @empty
                  @endforelse
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection



@section('scripts')

<script>



</script>


@endsection