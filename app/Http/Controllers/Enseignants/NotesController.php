<?php

namespace App\Http\Controllers\Enseignants;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Intervenir;
use App\Models\Diplome;
use Illuminate\Http\Request;

class NotesController extends Controller
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
        $interventions = Intervenir::where('idEns', session('id'))->get();
        foreach ($interventions as $intervention)
            $nomDip[$intervention->idCours] = Diplome::where('id', $intervention->cours->codeDip)->first('nom');
        return view('Enseignants.notes.index', compact('interventions', 'nomDip'));
    }

    public function choix($choix)
    {
        $interventions = Intervenir::where('idEns', session('id'))->get();
        foreach ($interventions as $intervention)
            $nomDip[$intervention->idCours] = Diplome::where('id', $intervention->cours->codeDip)->first('nom');
        return view('Enseignants.notes.index', compact('choix', 'interventions', 'nomDip'));
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
