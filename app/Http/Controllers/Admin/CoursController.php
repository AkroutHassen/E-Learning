<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Diplome;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours=Cours::all();
        return view('Admin.cours.index',compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diplomes=Diplome::all();
        return view('Admin.cours.create',compact('diplomes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nom'=>'required','codeDip'=>'required',
            'coefDip'=>'required','coefExam'=>'required','coefTd'=>'required',
            'nbHeures'=>'required']);
        Cours::create($request->all());
        return redirect()->route('cours.index')->with('success','Cours ' . $request->input('nom') .' a ajouté avec succéss');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cour)
    {
        $diplomes=Diplome::all();
        return view('Admin.cours.show',compact(['cour','diplomes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cour)
    {
        $diplomes=Diplome::all();
        return view('Admin.cours.edit',compact(['cour','diplomes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cour)
    {
        $request->validate(['nom'=>'required','codeDip'=>'required',
            'coefDip'=>'required','coefExam'=>'required','coefTd'=>'required',
            'nbHeures'=>'required']);
        $cour->update($request->all());
        return redirect()->route('cours.index')->with('success','Cours ' . $request->input('nom') .' est modifié avec succéss');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        $cours->delete();
        return redirect()->route('cours.index')->with('success','Le Cours est supprimé avec succéss');
    }
}
