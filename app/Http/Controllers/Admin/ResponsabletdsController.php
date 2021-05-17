<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intervenir;
use App\Models\Enseignant;
use App\Models\Diplome;
use App\Models\Groupe;
use App\Models\Cours;
use Illuminate\Http\Request;

class ResponsabletdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables = Intervenir::all();
        $i=0;
        $responsabletds=[];
        foreach ($responsables as $responsable){
            if($responsable->resp[0] != "0" ){
                $responsabletds[$i] = $responsable;
                $i++;
            }
                
        }
        // dd($responsabletds);
        return view('Admin.responsabletds.index',compact('responsabletds'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {   
        $diplomes=Diplome::all();
        $cours=Cours::all();
        $groupes=Groupe::all();
        $enseignants=Enseignant::all();
        
        return view('Admin.responsabletds.created',compact(['diplomes','enseignants','groupes','cours']));
    }

    public function create($msg)
    {  
        $cours=Cours::all();
        $coursdip=[];
        $i=0;
        foreach($cours as $cour){
            if($cour->codeDip == $msg)
                $coursdip[$i] = $cour;
                $i++;
        }
        $groupes=Groupe::all();
        $groupesdip=[];
        $i=0;
        foreach($groupes as $groupe){
            if($groupe->codeDip == $msg)
                $groupesdip[$i] = $groupe;
                $i++;
        }
        $enseignants=Enseignant::all();
        return view('Admin.responsabletds.create',compact(['diplomes','enseignants','groupesdip','coursdip']));
    }
    public function stored(Request $request)
    {
        $msg = $request->input('codeDip');
        return redirect()->route('responsabletd.create',$msg);
   
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Intervenir::create($request->all());
        return redirect()->route('responsabletd.index')->with('success','Etudiant ' . $request->input('nom') .' a ajouté avec succéss');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function show(Intervenir $intervenir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function edit(Intervenir $intervenir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervenir $intervenir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervenir $intervenir)
    {
        //
    }
}
