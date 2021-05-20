<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Inscription;
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
        //
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
        $etudiant = Etudiant::where('id', session('id'))->first();
        return view('Etudiants.infos.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $etudiant = Etudiant::where('id', session('id'))->first();
        return view('Etudiants.infos.edit', compact('etudiant'));
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
        if(!empty($request->codeDip))
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
            if($codeDip[0]->codeDip == null)
                Inscription::where('idEtu', session('id'))->delete();
            return redirect()->route("etudiant.diplome.index")->with('success', 'Inscription modifié avec succés !');    
        }
        else
        {
            if($request->input('tel') == '')
                $varTel = null;
            else
                $varTel = $request->input('tel');
            if($request->input('adresse') == '')
                $varAdresse = null;
            else
                $varAdresse = $request->input('adresse');
            Etudiant::where('id', session('id'))->update(['tel' => $varTel, 'adresse' => $varAdresse]);
            return redirect()->route('etudiant.infos.show', session('id'))->with('success', 'Données mis à jour avec succés !');
        }
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
