
@extends('front.layouts.index')

@section('title')
les informations de la carte de paiement
@endsection

@section('content')
 <hr class="featurette-divider">
<section class="content">
               <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="card">
              <div class="card-body ">
                <h5 class="card-title">Les coordonnées de mode de paiement</h5>

                <p class="card-text">


                    {!! Form::open(['route' => ['res.cr', $rep->id ], 'method' => 'post' ]) !!}

                    {{ csrf_field() }}


          {!! Form::hidden('total', $total, ['class' => 'form-control', 'id' => 'total' ]) !!}


          {!! Form::hidden('checkout', json_encode($checkout), ['class' => 'form-control', 'id' => 'checkout' ]) !!}


          <div class="form-group">
            <label for="number">Card Number</label>

            {!! Form::number('number', null, ['class' => 'form-control', 'id' => 'number' ]) !!}

          </div>
          <div class="form-group">
            <label for="exp_month">Expiration month</label>

            {!! Form::number('exp_month', null, ['class' => 'form-control', 'id' => 'exp_month' ]) !!}

          </div>

          <div class="form-group">
            <label for="exp_year">Expiration year</label>

            {!! Form::number('exp_year', null, ['class' => 'form-control', 'id' => 'exp_year' ]) !!}

          </div>

          <div class="form-group">
            <label for="holder">Nom complet</label>

            {!! Form::text('holder', null, ['class' => 'form-control', 'id' => 'holder' ]) !!}

          </div>

          <div class="form-group">
            <label for="cvv">CVV</label>

            {!! Form::text('cvv', null, ['class' => 'form-control', 'id' => 'cvv' ]) !!}

          </div>


          <div class="form-group">
            <label for="cvv">Type carte </label>

            {!! Form::select('brand', [0 => 'Visa', 1=>'Mastercard',2=>'PayPal',3 => 'Bancontact'], null, ['class' => 'form-control', 'id' => 'brand' ]) !!}

          </div>


          <div class="form-group">
            <span>Prix : {{ $total }} Euro</span>

          </div>



          <button type="submit" class="btn btn-primary">Submit</button>



                  {!! Form::close() !!}


                </p>

              </div>
            </div>





        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <div>
</div></section>

@endsection