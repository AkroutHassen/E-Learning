<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Diplome;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants=Etudiant::all();
        return view('Admin.etudiants.index',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $diplomes=Diplome::all();
        return view('Admin.etudiants.create',compact('diplomes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nom'=>'required','prenom'=>'required',
                            'email'=>'required','login'=>'required','mdp'=>'required',
                            'numGroupe'=>'required']);
        Etudiant::create($request->all());
        return redirect()->route('etudiant.index')->with('success','Etudiant ' . $request->input('nom').' '. $request->input('prenom') .' a ajouté avec succéss');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $diplomes=Diplome::all();
        return view('Admin.etudiants.show',compact(['etudiant','diplomes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $diplomes=Diplome::all();
        return view('Admin.etudiants.edit',compact(['etudiant','diplomes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Etudiant $etudiant)
    {
        $request->validate(['email'=>'required','login'=>'required','mdp'=>'required']);
    // $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiant.index')->with('success','L\'Etudiant ' . $request->input('nom').' '. $request->input('prenom') .' est modifié avec succéss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success','L\'Etudiant est supprimé avec succéss');
    }
}
