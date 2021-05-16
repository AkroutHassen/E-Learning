<?php

namespace App\Http\Controllers\Enseignants;

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
        $cours = Cours::all();
        $diplomes = Diplome::all();
        return view('Etudiants.cours.index', compact('cours', 'diplomes'));
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
        $diplomes = Diplome::all();
        foreach ($diplomes as $diplome)
        {
            if ($diplome->id == $cour->codeDip)
            {
                $nomDip = $diplome->nom;
                return view('Etudiants.cours.show', compact('cour', 'nomDip'));
            }
            else
                echo 'false';
        }
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
