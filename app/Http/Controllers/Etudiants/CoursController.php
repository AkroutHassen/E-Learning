<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Diplome;
use App\Models\Inscription;
use Illuminate\Http\Request;

class CoursController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::where('codeDip', session('codeDip'))->get();
        $nomDip = Diplome::where('id', session('codeDip'))->get('nom');
        $inscris = Inscription::where('idEtu', session('id'))->get('idCours');
        return view('Etudiants.cours.index', compact('cours', 'nomDip', 'inscris'));
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
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cour)
    {
        $inscri = false;
        if(Inscription::where('idCours', $cour->id)->where('idEtu', session('id'))->exists())
            $inscri = true;
        $nomDip = Diplome::where('id', $cour->codeDip)->get('nom');
        return view('Etudiants.cours.show', compact('cour', 'nomDip', 'inscri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
