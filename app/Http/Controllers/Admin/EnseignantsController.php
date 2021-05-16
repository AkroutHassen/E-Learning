<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;

use Illuminate\Http\Request;

class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants=Enseignant::all();
        return view('Admin.enseignants.index',compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.enseignants.create');
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
                            'grade'=>'required','numBureau'=>'required']);
        Enseignant::create($request->all());
        return redirect()->route('enseignant.index')->with('success','Enseignant ' . $request->input('nom').' '. $request->input('prenom') .' a ajouté avec succéss');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        return view('Admin.enseignants.show',compact('enseignant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        return view('Admin.enseignants.edit',compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate(['nom'=>'required','prenom'=>'required',
                            'email'=>'required','login'=>'required','mdp'=>'required',
                            'grade'=>'required','numBureau'=>'required']);
        // $etudiant = Etudiant::findOrFail($id);
        $enseignant->update($request->all());
        return redirect()->route('enseignant.index')->with('success','L\'Enseignant ' . $request->input('nom').' '. $request->input('prenom') .' est modifié avec succéss');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();
        return redirect()->route('enseignant.index')->with('success','L\'Enseignant est supprimé avec succéss');
    
    }
}
