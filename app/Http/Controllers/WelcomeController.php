<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theatre;

class WelcomeController extends Controller
{
    public function index()
    {
        $theatres = Theatre::latest()->take(9)->get();


        return view('welcome', compact('theatres') );
    }
}
