<?php

namespace App\Http\Controllers\Enseignants;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Diplome;
use App\Models\Intervenir;
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
        $interventions = Intervenir::where('idEns', session('id'))->where('resp', 0)->get('idCours');
        foreach ($interventions as $intervention)
            $nomDip[$intervention->idCours] = Diplome::where('id', $intervention->cours->codeDip)->first('nom');
        return view('Enseignants.cours.index', compact('interventions', 'nomDip'));
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
        $nomDip = Diplome::where('id', $cour->codeDip)->first('nom');
        return view('Enseignants.cours.show', compact('cour', 'nomDip'));
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
