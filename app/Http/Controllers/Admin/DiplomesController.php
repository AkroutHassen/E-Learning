<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diplome;
use Illuminate\Http\Request;

class DiplomesController extends Controller
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
        $diplomes=Diplome::all();
        return view('Admin.diplomes.index',compact('diplomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.diplomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nom'=>'required']);
        Diplome::create($request->all());
        return redirect()->route('diplome.index')->with('success','Diplome ' . $request->input('nom').' '. $request->input('prenom') .' a été ajouté avec succéss');
    
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
        return view('Admin.diplomes.edit',compact('diplome'));
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
        $request->validate(['nom'=>'required']);
        $diplome->update($request->all());
        return redirect()->route('diplome.index')->with('success','Le Diplome ' . $request->input('nom').' '. $request->input('prenom') .' a été modifié avec succéss');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diplome $diplome)
    {
        $diplome->delete();
        return redirect()->route('diplome.index')->with('success','Le Diplome a été supprimé avec succéss');
    }
}
