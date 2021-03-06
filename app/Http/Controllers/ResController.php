<?php

namespace App\Http\Controllers;

use App\{ Res, Rep, Siege, Cat};
use Illuminate\Http\Request;
use Auth;
use Mail;
use PDF;

use App\Mail\ReservedMail;
use App\Mail\ResMail;

//mn ba3d dir composer dump autoload
//mn ba3d dir  php artisan config:cache


class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Res  $res
     * @return \Illuminate\Http\Response
     */
    public function show(Res $res)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Res  $res
     * @return \Illuminate\Http\Response
     */
    public function edit(Res $res)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Res  $res
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Res $res)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Res  $res
     * @return \Illuminate\Http\Response
     */
    public function destroy(Res $res)
    {
        //
    }


    public function init(Rep $rep){


        $cats = Cat::where('lettre', '!=', 'x')->get();


        return view('back.res.sieges.showing', compact( 'rep', 'cats' ) );


    }



    public function checkout(Rep $rep, Request $request){



        if($request->checkout == "{}"){

            return back();

        }else{
            $checkout =  json_decode( $request->checkout )  ;


        }
        

         
        $total = 0;
        
/*
        foreach ($checkout as $key => $check) {
            # code...

            echo $key .'\n';

            echo json_encode($check) .'\n';

            echo '*****\n';
        }


        */


        return view('back.res.sieges.checkout', compact('rep','checkout', 'total'));


    }

    public function confirm(Rep $rep, Request $request){

        

        

        $checkout =  json_decode( $request->checkout )  ; 
        $total = 0;


        
        
        foreach ( $checkout as $key => $check ) {
            # code...

            $total += $check->price;

        }

        /*

        */


        /**/

        return view('back.res.sieges.confirm', compact('rep','checkout', 'total'));


    }
    //creation reservation
    public function cr(Rep $rep, Request $request){

        //collection info  to use in the mailing
        $info = [];


        //validating the card
        $this->validate($request, [
            'total' => 'required|numeric',
            'number' => 'required',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'cvv' => 'required|numeric',
            'holder' => 'required',
            'brand' => 'required',
        ]);



        //validating the card
        $checkout =  json_decode( $request->checkout )  ;

        //init the total
        $total = 0;

        

        //Loop and get the price of the input
        
        
        foreach ( $checkout as $key => $check ) {
            # code...
            // adding total to an item price
            $total += $check->price;

        }

        // if the real price != input price that mean a hacking attempt

        if( $total != $request->total ){

            $message = 'Dont try to hack';
            $state = 'error';

            return view('back.layouts.message', compact( 'message', 'error' ));

        }



        // loop throug every item in the jsoon input

        foreach ( $checkout as $key => $check ) {
            # code...


            //searching for a category

            $cat = Cat::where('nom', 'LIKE', '%' . $check->cat . '%')->first();

            // if category dont exist

            if(!$cat){

                //throw an error

                $message = 'Application error [ CAT ]';
                $state = 'error';

                return view('back.layouts.message', compact( 'message', 'error' ));

            }


            //searching a siege

            $siege = Siege::where('num', $check->num )
                ->where('num', $check->num )
                ->where('map', $key )
                ->where('cat_id', $cat->id )
                ->where('salle_id', $rep->salle->id )
                ->first();

            // if siege dont existe

            if( !$siege ){

                //throw error

                $message = 'Application error [ SIEGE ]';
                $state = 'error';

                return view('back.layouts.message', compact( 'message', 'error' ));

            }else{

                // creating the reservation

                $res = Res::create([
                    'user_id' => Auth::id(),
                    'rep_id' => $rep->id,
                    'siege_id' => $siege->id
                ]);

                // push info to use in mailing


                array_push($info, $res);

                

            }
            

        }


        // throw a message if payed

        //Ila 9entatk hat7ayad had lmail
       Mail::to(Auth::user()->email )->send( new ResMail( $info ) );


        $request->session()->put('infoArray', $info);


        return redirect()->route('res.pdf', compact($info));
/**/
    }

    public function pdf(Request $request){

        $info = $request->session()->get('infoArray', []);

        //$request->session()->forget('infoArray');


        if( count($info) > 0 ){

/*
            $data = [
                'foo' => 'bar'
            ];
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML('Hello World');
            return $mpdf->Output();

*/

            $pdf = PDF::loadView('back.res.pdf.pdf', compact('info'), ['orientation' => 'L']);

            //$pdf->download();
            return $pdf->stream('Tickets.pdf');

        }else{

            return view('back.layouts.message', compact( 'Success , regarde ta boite mail !', 'success' ));

        }



        





    }


}
