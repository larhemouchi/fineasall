<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
	Rep,
};

class HandicapController extends Controller
{
    public function check(Request $request){

    	return response()->json(true);

    }



    public function display(Rep $rep, Request $request){

    	//direct to display then display to res checkout


        $andicaped_detected = false;

        if($request->checkout == "{}"){

            return back();

        }else{
            $checkout =  json_decode( $request->checkout )  ;


        }

        foreach ($checkout as $property) {

            if( $property->cat == 'ANDICAPE' ){

                $andicaped_detected = true;

                //return redirect()->route('handicap.display', compact( 'rep', 'request') );

            }


        }

        if($andicaped_detected){

        	//dd( $checkout );

        	return view( 'front.handicap.display', compact('rep', 'checkout'));

        }else{

        	$total = 0;

        	return view('back.res.sieges.checkout', compact('rep','checkout', 'total'));

        }


    }





}
