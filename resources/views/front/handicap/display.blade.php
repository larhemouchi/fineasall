@extends('front.layouts.index')

@section('title')
Confirmation des siége handicapé
@endsection

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <hr class="featurette-divider">
            <h1>Confirmation des sieges handicapé</h1>


            @foreach( $checkout as $isHandicaped)





            


            @if( $isHandicaped->cat == 'ANDICAPE' )

              <form id="handicaped_detected_{{ $isHandicaped->num }}" class="handicaped_detected" data-id="{{ $isHandicaped->num }}">
                <div class="form-group">
                  <label for="handicaped-id_{{ $isHandicaped->num }}">Handicapé ID</label>
                  <input type="text" class="form-control" id="handicaped-id_{{ $isHandicaped->num }}" name="handicaped-id" placeholder="00-00-00"required pattern="[0-9A-Za-z]{2,2}-[0-9A-Za-z]{2,2}-[0-9A-Za-z]{2,2}">
                  
                </div>


                <div class="form-group">
                  <label for="handicaped-expiration_{{ $isHandicaped->num }}">Date de fin</label>
                  <input type="date" class="form-control" id="handicaped-expiration_{{ $isHandicaped->num }}" name="handicaped-expiration" required>
                  
                </div>




                <div class="form-group">
                  <label for="delivred-by_{{ $isHandicaped->num }}">Délivrer par :</label>
                  <select class="form-control" id="delivred-by_{{ $isHandicaped->num }}" required>
                    <option>Ministre de </option>

                  </select>
                </div>



                <button type="submit" id="handicaped_detected_button_{{ $isHandicaped->num }}" data-id="{{ $isHandicaped->num }}" class="btn btn-primary gocheck">Submit</button>
              </form>

            @endif





            @endforeach





              <hr />




              {!! Form::open(['method' => 'POST', 'route' => ['res.confirm', $rep->id ], 'id' => 'form_pass', 'class' => 'd-none']) !!}

                {{ csrf_field() }}


                {{ Form::hidden('checkout', json_encode( $checkout ), [ 'id' => 'checkout_input']) }}





                <button type="submit" id="pass" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Passer au paiment </button>


              {!! Form::close() !!}





            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <div>
</div></section>

@endsection

@section('scripts')

<script src="{{ asset('axios/axios.js') }}" type="text/javascript"></script>
<script src="{!! asset('validate/validate.min.js') !!}"></script>
<script src="{!! asset('swal/swal.min.js') !!}"></script>

<script type="text/javascript">

  $pass = $('#pass');
  $gocheck = $('.gocheck');
  $formpass = $('#form_pass');
  handicaped_detected = $('.handicaped_detected');

  var array_handicap = [];
  var array_police_handicap = [];



  @foreach( $checkout as $isHandicaped)
    @if( $isHandicaped->cat == 'ANDICAPE' )

    array_handicap.push('{{ $isHandicaped->num }}');

    @endif
  @endforeach


  $(document).ready(function() {







        $gocheck.click(function(e){

        $this = $(this);
        data_id = $this.data('id');

        id_cart = $("#handicaped_detected_"+data_id+" input[name=handicaped-id]").val();
        //console.log( $this );
        //    e.preventDefault();
        //    return false;
        

          if( handicaped_detected.valid() ){


            if( array_police_handicap.indexOf(id_cart) != -1 ){


              Swal.fire('Error', 'L\'id de la carte et répété', 'error');



            }else{



                axios.post('/check-handicaped')
                .then(function (response) {
                  // handle success
                  confirmation = response.data;

                  if( confirmation ){

                    
                    $('#handicaped_detected_'+data_id).remove();

                    array_police_handicap.push(id_cart);




                    array_handicap = array_handicap.filter(function(item){ return item != data_id });

                    Swal.fire('Good', 'Confirmed', 'success');

                    if( array_handicap.length == 0 ){

                      $formpass.removeClass('d-none');

                    }



                  }else{
                    Swal.fire('Error', 'Error de la validation', 'error');
                  }

                })
                .catch(function (error) {
                  // handle error
                  console.log(error);
                })
                .finally(function () {
                  // always executed
                });


            }



            e.preventDefault();
            return false;



          }else{


            e.preventDefault();

            Swal.fire('not valid', 'Not valid', 'error');

            return false;

          }



        });





  });








  
</script>

@endsection