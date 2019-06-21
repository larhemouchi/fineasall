<?php

namespace App\Http\Controllers;

use App\{Rep, Res, Theatre, Salle};
use Carbon\Carbon;
use Illuminate\Http\Request;

use Configuration;
use Reptool;


class RepController extends Controller
{


    public function search($phrase)
    {
        $reps = Rep::all()->take(0);

        

        $salles = Salle::where('nom', 'LIKE', '%'.$phrase.'%')->get();

        foreach($salles as $salle){


            foreach($salle->reps as $rep){

                $reps->push( $rep );

            }
            

        }

        unset($rep);

        

        $theatres = Theatre::where('titre', 'LIKE', '%'.$phrase.'%')->get();

        foreach($theatres as $theatre){

            foreach($theatre->reps as $rep){

                $reps->push( $rep );

            }

        }

        unset($rep);


        return view('back.rep.index', compact('reps') );
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
    private var $salles = Salle::get(['id', 'nom'])->pluck('nom', 'id');
    private var $theatres = Theatre::get(['id', 'titre'])->pluck('titre', 'id');
*/


    public function index()
    {
        $reps = Rep::paginate(9);

        return view('back.rep.index', compact('reps') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $salles = Salle::get(['id', 'nom'])->pluck('nom', 'id');
        $theatres = Theatre::get(['id', 'titre'])->pluck('titre', 'id');

        $dt = Carbon::now();

        //$dt = $dt->format('Y-m-d\TH:i:s');
        $dt = $dt->format('Y-m-d');




        return view('back.rep.create', compact('theatres', 'salles', 'dt'));
    }


    public function preFormInsert(Request $request)
    {







        $salles = Salle::get(['id', 'nom'])->pluck('nom', 'id');

        $salle_selected = $request->salle_id;
        $theatres = Theatre::get(['id', 'titre'])->pluck('titre', 'id');

        $theatre_selected = $request->theatre_id;



        $dt = Carbon::parse( $request->date );

        //$dt = $dt->format('Y-m-d\TH:i:s');
        $dt = $dt->format('Y-m-d');

        $howmany = $request->num;


        $selected_times = $request->heures;

        $price = $request->prix;


        //dd( $selected_times);



        return view('back.rep.pre_form_insert', compact('theatres', 'salles', 'dt', 'howmany', 'salle_selected', 'theatre_selected', 'selected_times', 'price'));

    }

    

    public function insert(Request $request){

        $my_form = $request->myForm;

        //dd( $my_form);

        $items_count = count( $request->myForm['prix'] );


        $collect_reps = [];


        $reps;


        foreach( range(1,$items_count ) as $num ){

            //store($prix, $theatre_id, $salle_id, $date, $hours)




            $reps_array = Reptool::store(  
                $my_form['prix'][$num],
                $my_form['theatre_id'][$num],
                $my_form['salle_id'][$num],
                $my_form['date'][$num],
                $my_form['hours'][$num] 
            );


            array_push( $collect_reps, $reps_array );



        }


        $reps = Rep::whereIn('id', $collect_reps )->paginate(9);


        return view('back.rep.index', compact('reps') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $hours = $request->heures;

        $collect_reps = [];
        $collect_reps_id = [];



        if( isset($hours ) ){


            foreach( $hours as $hour ){




                $date_houre = Carbon::parse($request->date . ' '. Configuration::hours( $hour ) ) ;

                

                $rep = Rep::create([

                    'prix' => $request->prix,
                    'theatre_id' => $request->theatre_id,
                    'salle_id' => $request->salle_id,
                    'dateheure' => $date_houre

                ]);

                if(!$rep){

                    $message = 'Date Erreur';
                    $state = 'error';

                    return view('back.layouts.message', compact( 'message', 'state' ));
                    
                    break;
                }else{

                    array_push( $collect_reps_id, $rep->id);

                    array_push( $collect_reps , [ 
                        'txt' => 'a la date : '.$request->date . ' '. Configuration::hours( $hour),
                        'link' => route('reps.show',$rep->id )
                     ] );
                }


                
                $reps = Rep::whereIn('id', $collect_reps_id)->paginate(9);


                return view('back.rep.index', compact('reps') );
               

            }

            
            
        }else{
            return back()->withInput();
        }



        //foreach(){

        //}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rep  $rep
     * @return \Illuminate\Http\Response
     */
    public function show(Rep $rep)
    {



        if(! $rep){

            return redirect()->route('welcome');

        }

        Carbon::setLocale('fr_FR');

        $carbon = Carbon::parse($rep->dateheure);



        return view('back.rep.show', compact( 'rep', 'carbon' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rep  $rep
     * @return \Illuminate\Http\Response
     */
    public function edit(Rep $rep)
    {
        $salles = Salle::get(['id', 'nom'])->pluck('nom', 'id');
        $theatres = Theatre::get(['id', 'titre'])->pluck('titre', 'id');


        $dt = Carbon::parse(  $rep->dateheure );

        $dt = $dt->format('Y-m-d\TH:i:s');


        return view('back.rep.edit', compact( 'rep','theatres', 'salles', 'dt') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rep  $rep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rep $rep)
    {

        $rep->theatre_id = $request->theatre_id;
        $rep->prix = $request->prix;
        $rep->salle_id = $request->salle_id;
        $rep->dateheure = Carbon::parse($request->dateheure)->format('Y-m-d\TH:i:s');


        if($rep->save()){

            return redirect()->route('reps.show', $rep->id);

        }else{

        $message = 'Erreur modification';
        $state = 'error';

        return view('back.layouts.message', compact( 'message', 'state' ));



        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rep  $rep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rep $rep)
    {
        $res = Res::where('rep_id', $rep->id)->delete();

        if(count($res) > 0) {

            $res->delete();


            

        }

        Rep::destroy($rep->id);

        
        $message = 'Suprimé avec success';
        $state = 'success';

        return view('back.layouts.message', compact( 'message', 'state' ));

    }

    
}
