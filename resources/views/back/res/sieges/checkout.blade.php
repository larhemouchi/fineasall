@extends('back.layouts.index')

@section('title')
Modifier les informations d'un théatre
@endsection

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!--
            <div class="callout callout-info">
              <h5><i class="fa fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>

            -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-theater-masks"></i> {{ config('app.name') }}
                    <small class="float-right">{{ \Carbon\Carbon::now() }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              {{--
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              --}}

              <!-- Table row -->
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

                    @foreach( $checkout as $map => $check )
                    <tr>
                      <td>{{ $rep->theatre->titre }}</td>
                      <td>{{ $rep->salle->nom }}</td>
                      <td>{{ $check->cat  }}</td>
                      <td>{{ $check->num  }}</td>
                      <td>{{ $check->price }}</td>

                      @php 
                      $total+= $check->price;
                      @endphp

                      
                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../admin/dist/img/credit/visa.png" alt="Visa">
                  <img src="../admin/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../admin/dist/img/credit/maestro.png" alt="Maestro">
                  <img src="../admin/dist/img/credit/american-express.png" alt="American Express">
                  <img src="../admin/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Le {{ \Carbon\Carbon::now() }}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width:50%">Total:</th>
                        <td>{{ $total }}</td>
                      </tr>

                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">

                  {!! Form::open(['method' => 'POST', 'route' => ['res.confirm', $rep->id ]]) !!}

                  {{ csrf_field() }}


                  {{ Form::hidden('checkout', json_encode( $check ), [ 'id' => 'checkout_input']) }}
                  
                  <button type="submit" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Confirm
                    Payment
                  </button>

                  {!! Form::close() !!}
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <div>
</div></section>

@endsection