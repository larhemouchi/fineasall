<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Theatre, Salle, Rep};


class WelcomeController extends Controller
{
    public function index()
    {
        $theatres = Theatre::latest()->take(12)->get();
        $salles = Salle::latest()->take(12)->get();
        $reps = Rep::latest()->take(12)->get();







        return view('welcome', compact('theatres', 'salles', 'reps') );
    }
}
