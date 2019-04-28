<?php

namespace App\Http\Controllers;

use App\{ Res, Rep, Siege, Cat};
use Illuminate\Http\Request;
use Auth;

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

        

        $checkout =  json_decode( $request->checkout )  ; 
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

    public function cr(Rep $rep, Request $request){

        $this->validate($request, [
            'total' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required|numeric',
            'exp_month' => 'required',
            'cvv' => 'required',
            'holder' => 'required',
            'brand' => 'required',
        ]);


        $checkout =  json_decode( $request->checkout )  ; 
        $total = 0;


        
        
        foreach ( $checkout as $key => $check ) {
            # code...

            $total += $check->price;

        }

        if( $total != $request->total ){

            $message = 'Dont try to hack';
            $state = 'error';

            return view('back.layouts.message', compact( 'message', 'state' ));

        }


        foreach ( $checkout as $key => $check ) {
            # code...

            $cat = Cat::where('nom', 'LIKE', '%' . $check->cat . '%')->first();

            if(!$cat){


                $message = 'Application error [ CAT ]';
                $state = 'error';

                return view('back.layouts.message', compact( 'message', 'state' ));

            }

            $siege = Siege::where('num', $check->num )
                ->where('num', $check->num )
                ->where('map', $key )
                ->where('cat_id', $cat->id )
                ->where('salle_id', $rep->salle->id )
                ->first();

            if( !$siege ){

                $message = 'Application error [ SIEGE ]';
                $state = 'error';

                return view('back.layouts.message', compact( 'message', 'state' ));

            }else{

                Res::create([
                    'user_id' => Auth::id(),
                    'rep_id' => $rep->id,
                    'siege_id' => $siege->id
                ]);

            }
            

        }





        $message = 'Conglation Payé avec succes';
        $state = 'success';

        return view('back.layouts.message', compact( 'message', 'state' ));
/**/
    }


}
