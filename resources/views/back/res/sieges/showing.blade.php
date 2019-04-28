@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('styles')
<link href="{{ asset('/seat/jquery.seat-charts.css') }}" rel="stylesheet" >






<style>


/*
a {
  color: #b71a4c;
}

.front-indicator {
  //width: 145px;
  //margin: 5px 32px 15px 32px;
  background-color: #f6f6f6;  
  color: #adadad;
  text-align: center;
  padding: 3px;
  border-radius: 5px;
}
.wrapper {
  //width: 100%;
  text-align: center;
  margin-top:150px;
}
.container {
  margin: 0 auto;
  //width: 500px;
  text-align: left;
}
.booking-details {
  float: left;
  text-align: left;
  //margin-left: 35px;
  font-size: 12px;
  position: relative;
 //height: 401px;
}
*/
.booking-details h2 {
 // margin: 25px 0 20px 0;
  font-size: 17px;
}
.booking-details h3 {
  //margin: 5px 5px 0 0;
  font-size: 14px;
}


div.seatCharts-cell {
  color: #182C4E;
 height: 25px;
 width: 25px;
  line-height: 25px;
  
}
div.seatCharts-seat {
  color: #FFFFFF;
  cursor: pointer;  
}
div.seatCharts-row {
  //height: 35px;
}
div.seatCharts-seat.available {
  background-color: #B9DEA0;

}
div.seatCharts-seat.available.first-class {
 //background: url(vip.png); 
  background-color: #3a78c3;
}
div.seatCharts-seat.focused {
  background-color: #76B474;
}
div.seatCharts-seat.selected {
  background-color: #E6CAC4;
}
div.seatCharts-seat.unavailable {
  background-color: #472B34;
}
div.seatCharts-container {
  border-right: 1px dotted #adadad;
  //width: 200px;
  //padding: 20px;
  //float: left;
}
div.seatCharts-legend {
  //padding-left: 0px;
  //position: absolute;
  bottom: 16px;
}
ul.seatCharts-legendList {
  padding-left: 0px;
}
span.seatCharts-legendDescription {
  margin-left: 5px;
  line-height: 30px;
}


.checkout-button {
  //display: block;
  //margin: 10px 0;
  font-size: 14px;
}


#selected-seats {
  //max-height: 90px;
  overflow-y: scroll;
  overflow-x: none;
  //: 170px;
}


@foreach($cats as $cat)


  {{ '.'.$cat->nom.'.available'.'{' }}


    {{ 'background-color : '. Decore::colorsCats($cat->nom) .' !important;' }}

  {{ '}' }}



@endforeach


</style>








@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les sieges</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">

          <div class="col-md-9">
            <div id="seat-map">
              <div class="front-indicator">Front</div>
            </div>
          </div>


          <div class="col-md-3">

                        <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                


    <div class="booking-details">
      <h2>Booking Details</h2>
      <h3> Selected Seats (<span id="counter">0</span>):</h3>
      <ul id="selected-seats">
      </ul>
      Total: <b>$<span id="total">0</span></b>



      {!! Form::open(['method' => 'POST', 'route' => ['res.checkout', $rep->id ]]) !!}
      {{ csrf_field() }}
      {{ Form::hidden('checkout', '{}', [ 'id' => 'checkout_input']) }}


      <button class="checkout-button">Checkout &raquo;</button>

      {!! Form::close() !!}



      <div id="legend"></div>
    </div>

                  <p class="card-text">
                  


                </p>


                

                <hr />








              </div>
            </div>







          </div>
          <!-- /.col-md-6 -->



        </div>
        <!-- /.row -->
      </div><!-- /.container -->


@endsection



@section('scripts')
<script src="{{ asset('/seat/jquery.seat-charts.js') }}"></script>


<script src="{{ asset('/axios/axios.js') }}"></script>



<script>

  var schema_salle = "{{ config('app.schema_salle') }}";


  function recalculateTotal(sc) {
    var total = 0;

    //basically find every selected seat and sum its price
    sc.find('selected').each(function () {
      total += this.data().price;
    });
    
    return total;
  }

$(document).ready(function() {

  $checkout_input = $('#checkout_input');

  console.log('{{ $rep->id }}');

  axios.get('/salle-sieges-info/{{ $rep->id }}')
  .then(function (response) {
    // handle success
    console.log(response);

    var seats = response.data.models ;


    var items = [] ;

    var deja_res = response.data.deja_res;

    console.log( items );

    console.log( 'deja_res' );
    console.log( deja_res );

    /*var items_keys = Object.keys(seats);
    console.log(items_keys);
    */

    for (var prop in seats) {


      items.push( [prop, 'available', seats[prop]['category'] ] );
      items.push( [prop, 'unavailable', seats[prop]['category'] + ' ' +'Booked' ] );
    }




  var firstSeatLabel = 1;


      var $cart = $('#selected-seats'),
        $counter = $('#counter'),
        $total = $('#total'),
        sc = $('#seat-map').seatCharts({
        map: schema_salle.split("0"),
        seats: seats
        /*
        {
          f: {
            price   : 100,
            classes : 'first-class', //your custom CSS class
            category: 'First Class'
          },
          e: {
            price   : 40,
            classes : 'economy-class', //your custom CSS class
            category: 'Economy Class'
          }         
        
        }
        */
        ,
        naming : {
          top : true,
          getLabel : function (character, row, column) {
            return firstSeatLabel++;
          },
        },
        legend : {
          node : $('#legend'),
            items : items
            /*
            items : [
            [ 'f', 'available',   'First Class' ],
            [ 'e', 'available',   'Economy Class'],
            [ 'f', 'unavailable', 'Already Booked']
            ]
            */      
        },
        click: function () {
          if (this.status() == 'available') {

            price = this.data().price;
            id = this.settings.id;
            cat = this.data().category;
            label = this.settings.label;
            //let's create a new <li> which we'll add to the cart items
            $('<li>'+cat+' Seat # '+label+': <b>$'+price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
              .attr('id', 'cart-item-'+id)
              .data('seatId', id)
              .appendTo($cart);
            
            /*
             * Lets up<a href="https://www.jqueryscript.net/time-clock/">date</a> the counter and total
             *
             * .find function will not find the current seat, because it will change its stauts only after return
             * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
             */
            $counter.text(sc.find('selected').length+1);



            $total.text(recalculateTotal(sc)+ price );
            /*

            alert('price' + this.data().price);

            alert('id | map' + this.settings.id);

            alert( 'cat' + this.data().category );

            */


            /*


            


            */

            past_state = JSON.parse( $checkout_input.val() );

            past_state[id] = new Object();

            past_state[id].price = price;

            past_state[id].cat = cat;

            past_state[id].num = label;

            $checkout_input.val(  JSON.stringify( past_state ) );

            //console.log( $checkout_input.val() );

            return 'selected';



          } else if (this.status() == 'selected') {


            /*price = this.data().price;
            
            id = this.settings.id;
            cat = this.data().category;
            label = this.settings.label
            console.log(price, id, cat, label);
*/
            //update the counter
            $counter.text(sc.find('selected').length-1);
            //and total
            $total.text(recalculateTotal(sc)-this.data().price);

            $('#cart-item-'+this.settings.id).remove();

            
          
            //remove the item from our cart
            

            past_state = JSON.parse($checkout_input.val());

            delete past_state[this.settings.id];

            $checkout_input.val(  JSON.stringify( past_state ) );

            /*
            */


          
            //seat has been vacated
            return 'available';
          } else if (this.status() == 'unavailable') {
            //seat has been already booked
            return 'unavailable';
          } else {
            return this.style();
          }
        }
      });

      //this will handle "[cancel]" link clicks
      $('#selected-seats').on('click', '.cancel-cart-item', function () {
        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
        sc.get($(this).parents('li:first').data('seatId')).click();
      });

      //let's pretend some seats have already been booked
      sc.get(deja_res).status('unavailable');








  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
    console.log('iam always been exec');
  });
  

  });




</script>


@endsection