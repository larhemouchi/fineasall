@extends('front.layouts.index')

@section('title')
MESSAGE
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="nidden-xs col-md-2"></div>

              <div class="col-md-8">
          


            <div class="error-page">

              @if($state == 'success')
              <img class="img-fluid" src="{{ asset('/logos/checked.svg') }}"  >
              @elseif($state == 'error')
              <img class="img-fluid" src="{{ asset('/logos/close.svg') }}"  >
              @endif
              <div class="error-content">
                <h3> {{ $message }}.</h3>

                <p>
                  <a href="{{ route('welcome') }}">Retour</a>
                </p>

                


                @if(!empty($buttons))



                  @foreach( $buttons  as $button)

                    <a class="btn btn-lg btn-success" href="{{ route( $button[ 'link' ] ) }}">$button[ 'txt' ]</a>

                  @endforeach


                @endif

                
             
            </div>


          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('/application/js/coll_corr.js')}}"> 

</script>
@endsection