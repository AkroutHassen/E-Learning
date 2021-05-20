<?php

namespace App\Http\Controllers\Enseignants;

use App\Http\Controllers\Controller;
use App\Models\Intervenir;
use App\Models\Diplome;
use App\Models\Cours;
use Illuminate\Http\Request;

class TDsController extends Controller
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
        $interventions = Intervenir::where('idEns', session('id'))->where('resp', '<>', 0)->get();
        foreach ($interventions as $intervention)
            $nomDip[$intervention->idCours] = Diplome::where('id', $intervention->cours->codeDip)->first('nom');
        return view('Enseignants.tds.index', compact('interventions', 'nomDip'));
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
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function show($idTD)
    {
        $td = Cours::where('id', $idTD)->first();
        $nomDip = Diplome::where('id', $td->codeDip)->first('nom');
        return view('Enseignants.tds.show', compact('td', 'nomDip', 'idTD'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function edit(Intervenir $intervenir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervenir $intervenir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervenir $intervenir)
    {
        //
    }
}
