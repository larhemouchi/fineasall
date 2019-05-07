@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">


            <div class="error-page">

              @if($state == 'success')
              <img class="img-fluid" src="{{ asset('/logos/checked.svg') }}"  >
              @elseif($state == 'error')
              <img class="img-fluid" src="{{ asset('/logos/close.svg') }}"  >
              @endif
              <div class="error-content">
                <h3> {{ $message }}.</h3>

                <p>
                  <a href="{{ route('/') }}">Retour</a>
                </p>

                
              </div>
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