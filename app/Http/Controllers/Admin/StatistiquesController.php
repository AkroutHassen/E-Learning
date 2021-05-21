<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diplome;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Cours;
use App\Models\Note;
use App\Models\Intervenir;
use App\Models\Groupe;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
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
        $diplomes = Diplome::all();
        $cours = Cours::all();
        $etudiants = Etudiant::all();
        $enseignants = Enseignant::all();
        $groupes = Groupe::all();
        $intervenirs = Intervenir::all();
        $notes = Note::all();
        return view('Admin.welcome',compact(['diplomes','cours','etudiants','enseignants','groupes','intervenirs','notes']));
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
