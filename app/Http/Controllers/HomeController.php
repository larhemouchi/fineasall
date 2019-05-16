<?php

namespace App\Http\Controllers;
use App\{Theatre, User, Salle, Res, Rep};
use Illuminate\Http\Request;

use Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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


        $users = User::role('regular')->get();



        $admins = User::role('super_admin')->get();
        $admins = $admins->filter(function($item, $key){

            //dd($item->id, Auth::id(), $item->id != Auth::id());

            return $item->id != Auth::id();

        });
        $theatres = Theatre::all();
        $salles = Salle::all();
        $reps = Rep::all();
        $res = Res::all();


        return view('back/home', compact('users', 'admins', 'theatres', 'salles', 'reps', 'res'));
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
