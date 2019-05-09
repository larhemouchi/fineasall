<?php

namespace App\Http\Controllers;

use App\{Theatre, rep, Res};
use Illuminate\Http\Request;
use Img;
class TheatreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($phrase)
    {
        $theatres = Theatre::where('titre', 'LIKE', '%'.$phrase.'%')->paginate(9);

        return view('back.theatre.index', compact('theatres') );
    }


    public function index()
    {
        $theatres = Theatre::paginate(9);

        return view('back.theatre.index', compact('theatres') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.theatre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $img = Img::store( $request, 'theatre' , 'titre');

        $theatre = Theatre::create([
            'titre' => $request->titre,
            'img' => $img,
            'desc' => $request->desc,
            'slug' => str_slug($request->titre, '-')
        ]);

        if($theatre){

            return redirect()->route('theatres.show', $theatre->slug);

        }else{
            return ':/';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $theatre = Theatre::where('slug', $slug )->first();

        if($theatre){

        }else{
            return redirect()->route('welcome');
        }

        return view('back.theatre.show', compact( 'theatre' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatre $theatre)
    {

        //return  $theatre ;

        return view('back.theatre.edit', compact( 'theatre' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theatre $theatre)
    {

        if( $request->hasFile('img') ){
            Img::delete($theatre,'theatre', 'titre');
        }

        $img = Img::store( $request, 'theatre' , 'titre');


        $theatre->img = $img;



        $theatre->titre = $request->titre;
        $theatre->desc = $request->desc;
        $theatre->slug = str_slug($request->titre, '-');

        $updated = $theatre->update();


        return redirect()->route('theatres.show', $theatre->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatre $theatre)
    {

        Img::delete($theatre,'theatre', 'titre');

        $reps = Rep::where('theatre_id', $theatre->id)->get();

        foreach($reps as $rep){

            $res = Res::where('rep_id', $rep->id)->get();

            

            if(count($res) > 0) {

                $res->delete();

                

            }


        }

        $reps->delete();


        Theatre::destroy($theatre->id);


        $message = 'DESTROYED SUCCEFULLY';
        $state = 'success';

        return view('back.layouts.message', compact( 'message', 'state' ));



        
        
    }
}
