@extends('front.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('styles')
<link href="{{ asset('/seat/jquery.seat-charts.css') }}" rel="stylesheet" >






<style>



</style>








@endsection

@section('content')

  <hr class="featurette-divider">
<h3 class="text-center col-xs-12"> Toutes les salles</h3>
  <hr class="featurette-divider">
      <div class="container">

          
        <div class="row">


                  <div id="seat-map">
      <div class="front-indicator">Front</div>
    </div>
        </div>



        <div class="row">

          <div class="col-md-6">



            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>



                <p class="card-text">




                  


                </p>


                

                <hr />








              </div>
            </div>
          </div>
          <div class="col-md-6">

                        <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                


    <div class="booking-details">
      <h2>Booking Details</h2>
      <h3> Selected Seats (<span id="counter">0</span>):</h3>
      <ul id="selected-seats">
      </ul>
      Total: <b>$<span id="total">0</span></b>
      <button class="checkout-button">Checkout &raquo;</button>
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

  axios.get('/salle-sieges-info/{{ $salle->slug }}/1')
  .then(function (response) {
    // handle success
    console.log(response);

    var seats = response.data ;
    var items = [] ;

    console.log( items );

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
            //let's create a new <li> which we'll add to the cart items
            $('<li>'+this.data().category+' Seat # '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
              .attr('id', 'cart-item-'+this.settings.id)
              .data('seatId', this.settings.id)
              .appendTo($cart);
            
            /*
             * Lets up<a href="https://www.jqueryscript.net/time-clock/">date</a> the counter and total
             *
             * .find function will not find the current seat, because it will change its stauts only after return
             * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
             */
            $counter.text(sc.find('selected').length+1);
            $total.text(recalculateTotal(sc)+this.data().price);
            
            return 'selected';
          } else if (this.status() == 'selected') {
            //update the counter
            $counter.text(sc.find('selected').length-1);
            //and total
            $total.text(recalculateTotal(sc)-this.data().price);
          
            //remove the item from our cart
            $('#cart-item-'+this.settings.id).remove();
          
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
      sc.get(['1_2', '8_9']).status('unavailable');








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