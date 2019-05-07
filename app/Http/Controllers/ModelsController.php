<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function search(Request $request)
    {

        $phrase = $request->search;

        return redirect()->route($request->model.'.search', compact('phrase'));
    }
}
