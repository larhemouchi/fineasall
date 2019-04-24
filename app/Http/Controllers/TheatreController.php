<?php

namespace App\Http\Controllers;

use App\Theatre;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Theatre::all();
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
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function show(Theatre $theatre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $theatre = Theatre::where('slug', $slug)->get();

        return view('back.theatre.edit', compact( $theatre ) );
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatre $theatre)
    {
        //
    }
}
