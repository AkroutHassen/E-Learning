<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfosController extends Controller
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
        // $notes = Note::all();
        // $diplomes = Diplome::all();
        // foreach ($diplomes as $diplome)
        // {
        //     $nomDip[$diplome->id] = $diplome->nom;
        // }
        // return view('Etudiants.cours.index', compact('cours', 'nomDip'));
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
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $etudiants = Etudiant::all();
        return view('Etudiants.infos.index', compact('etudiants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['codeDip'=>'required']);
        //$etudiant->update($request->all());
        if($request->input('codeDip') == 'null')
            $var = null;
        else
            $var = $request->input('codeDip');
        DB::table('etudiants')->where('id', $id)->update(['codeDip' => $var]);
        $codeDip = Etudiant::where('id', $id)->get('codeDip');
        session(['codeDip' => $codeDip[0]->codeDip]);
        return redirect()->route("diplome.index")->with('success', 'Inscription modifié avec succés !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }
}
