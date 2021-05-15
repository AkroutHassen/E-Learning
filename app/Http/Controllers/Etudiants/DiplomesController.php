<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Diplome;
use Illuminate\Http\Request;

class DiplomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomes = Diplome::all();
        return view('Etudiants.diplomes.index', compact('diplomes'));
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
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function show(Diplome $diplome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function edit(Diplome $diplome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diplome $diplome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diplome $diplome)
    {
        //
    }
}
