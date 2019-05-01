<?php

namespace App\Http\Controllers;

use App\{Salle, Cat, Siege, Theatre, Rep, Res};
use Illuminate\Http\Request;

use Money;
use Math;
use Auth;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salles = Salle::paginate(9);

        return view('back.salle.index', compact('salles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.salle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salle = Salle::create([
            'nom' => $request->nom,
            'adress' => $request->adress,
            'slug' => str_slug($request->nom, '-')
        ]);

        $sieges = str_split( config('app.schema_salle') ) ;

        if($salle){

            return redirect()->route('salles.show', $salle->slug);

        }else{
            return ':/';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $salle = Salle::where('slug', $slug )->first();

        if($salle){

        }else{
            return redirect()->route('welcome');
        }

        return view('back.salle.show', compact( 'salle' ) );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {
        return view('back.salle.edit', compact( 'salle' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        $salle->nom = $request->nom;
        $salle->adress = $request->adress;
        $salle->slug = str_slug($request->nom, '-');

        $salle->update();

        return redirect()->route('salles.show', $salle->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salle $salle)
    {
        Salle::destroy($salle->id);

       return redirect('/');
    }



    public function siegesInfo(Rep $rep)
    {

        $theatre = $rep->theatre; 
        $salle = $rep->salle;


        //////////////////////////

        //return Math::pourcentage( 50, 200 );
            //7_2
        /*
        f: {
                                price   : 100,
                                classes : 'first-class', //your custom CSS class
                                category: 'First Class'
                            },
                            */
        //id salle


        //for looping num siege
        $num = 1;

        //for map
        $x = 1;
        $y = 1;

        //models Category and price
        $models = [];


        //Les sieges reserver

        $deja_res = [];


        /**/
        // schema per character
        $sieges = str_split( config('app.schema_salle') ) ;



        foreach ($sieges as $siege) {
            

            if($siege == '0'){

                $x++;
                $y = 1;

            }elseif($siege != '0' && $siege != '_' ){

                //if found in array enter
                //if not found assign

                // 
                //$c = $models[$siege]['model'];

                if( in_array ( $siege, $models ) ){
                    
                    $c_id = $models[$siege]['model']->id;

                }else{

                    $category = Cat::where('lettre', $siege)->first();

                    $c_id = $category->id;

                    $models[$siege]['model'] = $category;

                    //les prix sont dans la rep : X 
                    $models[$siege]['price'] = Money::limit( Math::pourcentage( $rep->prix , $category->taux  ));
                    $models[$siege]['classes'] = ucwords( $category->nom );
                    $models[$siege]['category'] =  $category->nom ;
                }

                //if la salle est rempli des sieges

                if( ! $salle->sieges_complet ){


                    $s = Siege::create([

                        'num' => $num,
                        'map' => $x.'_'.$y,
                        'salle_id'=> $salle->id,
                        'cat_id' => $c_id
                    ]);





                }else{

                    $s = Siege::where('num' , $num)
                    ->where('map' , $x.'_'.$y)
                    ->where('salle_id' , $salle->id)
                    ->where('cat_id' , $c_id)
                    ->first();

                    if(!$s){

                        return json_encode( [] );



                    }



                }


                

                $reserved = Res::where('siege_id', $s->id )
                    ->where('rep_id', $rep->id )
                    ->where('user_id', Auth::id() )
                    ->first();

                if( $reserved ){

                    
                    array_push($deja_res, $x.'_'.$y);
                }


                $num++;
                $y++;

                

            }elseif($siege != '0' && $siege == '_'){


                $y++;

            }else{
                return json_encode( [] );
            }

        }

        $salle->sieges_complet = True;

        $salle->save();


        return json_encode( ['models' => $models ,'deja_res' => $deja_res ] );


        ///////////////////

    }
}
