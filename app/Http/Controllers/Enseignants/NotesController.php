<?php

namespace App\Http\Controllers\Enseignants;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Intervenir;
use App\Models\Inscription;
use App\Models\Cours;
use App\Models\Etudiant;
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
        return view('Enseignants.notes.index', compact('interventions'));
    }

    public function choix($idCours, $resp)
    {
        $interventions = Intervenir::where('idEns', session('id'))->get();
        $inscriptions = Inscription::where('idCours', $idCours)->get('idEtu');
        $cour = Cours::where('id', $idCours)->first('nom');
        $etudiants = Etudiant::whereIn('id', $inscriptions)->get();
        $notes = [];
        foreach($etudiants as $etudiant)
        {
            if (Note::where('idCours', $idCours)->where('idEtu', $etudiant->id)->exists())
                $notes[$etudiant->id] = Note::where('idCours', $idCours)->where('idEtu', $etudiant->id)->first();
        }
        if ($resp != 0)
            $etudiants = Etudiant::whereIn('id', $inscriptions)->where('numGroupe', $resp)->get();
        return view('Enseignants.notes.index', compact('idCours', 'interventions', 'etudiants', 'cour', 'resp', 'notes'));
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
    public function store(Request $request, $id, $resp)
    {
        $request->validate(['idEtu'=>'required', 'idCours'=>'required']);
        Note::create($request->all());
        return redirect()->route("enseignant.note.choix", [$request->input('idCours'), $resp])->with('success', 'Note affecté avec succés !');
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
    public function update(Request $request, Note $note, $resp)
    {
        if(null != $request->input('noteExam'))
            Note::where('idEtu', $request->input('idEtu'))->where('idCours', $request->input('idCours'))->update(['noteExam' => $request->input('noteExam')]);
        elseif(null != $request->input('noteTd'))
            Note::where('idEtu', $request->input('idEtu'))->where('idCours', $request->input('idCours'))->update(['noteTd' => $request->input('noteTd')]);
        $checkNote = Note::where('idEtu', $request->input('idEtu'))->where('idCours', $request->input('idCours'))->first();
        if(isset($checkNote->noteExam) && isset($checkNote->noteTd))
        {
            $moy = ($checkNote->noteExam * $checkNote->cours->coefExam + $checkNote->noteTd * $checkNote->cours->coefTd) / ($checkNote->cours->coefExam + $checkNote->cours->coefTd);
            Note::where('idEtu', $checkNote->idEtu)->where('idCours', $checkNote->idCours)->update(['moy' => $moy]);
        }
        return redirect()->route("enseignant.note.choix", [$checkNote->idCours, $resp])->with('success', 'Note affecté avec succés !');
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
