<?php

namespace App\Http\Controllers;
use App\{Theatre, User, Salle, Res, Rep};
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function superAdmin(){

        $users = User::whereNotIn('id', [1,2])->get();

        $theatres = Theatre::all();
        $salles = Salle::all();
        $reps = Rep::all();
        $res = Res::all();


        return view('back/home', compact('users', 'theatres', 'salles', 'reps', 'res'));
    }
    public function regular(){

        return view( 'home' );

    }
    public function index()
    {
        /*
        $theatres = Theatre::get(9);

        return $theatres;
        */

        if(  Auth::user()->hasRole('super_admin')   ){

            return redirect()->route( 'users.super-admin' );

        }else{
            return redirect()->route( 'users.regular' );
        }

        
    }
}
