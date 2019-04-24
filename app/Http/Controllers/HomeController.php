<?php

namespace App\Http\Controllers;
use App\Theatre
use Illuminate\Http\Request;

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
    public function index()
    {
        /*
        $theatres = Theatre::get(9);

        return $theatres;
        */

        return view('home', compact('theatres') );
    }
}
