<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intervenir;
use App\Models\Enseignant;
use App\Models\Diplome;
use App\Models\Groupe;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ResponsablecoursController extends Controller
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
        $responsablecours=[];
        foreach ($responsables as $responsable){
            if($responsable->resp == "0" ){
                $responsablecours[$i] = $responsable;
                $i++;
            }
                
        }
       
        $cours = Cours::all();
        $diplomes=Diplome::all();
        $enseignants = Enseignant::all();
        $nomDip=[];
        foreach ($cours as $cour) {
            foreach ($diplomes as $diplome) {
                if ($cour->codeDip == $diplome->id )
                $nomDip[$cour->id] = $diplome->nom;
            }
        }
        
        $nomEns=[];
        foreach($enseignants as $enseigant){
            $nomEns[$enseigant->id] = $enseigant->nom .' '.$enseigant->prenom ;
        }
        $nomCours=[];
        foreach($cours as $cour){
            $nomCours[$cour->id] = $cour->nom;
        }

        return view('Admin.responsablecours.index',compact('responsablecours','nomDip','nomEns','nomCours'));
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
        $enseignants=Enseignant::all();
        
        return view('Admin.responsablecours.created',compact(['diplomes','enseignants','groupes']));
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
        
        $enseignants=Enseignant::all();
        return view('Admin.responsablecours.create',compact(['diplomes','enseignants','coursdip']));
  
    }
    public function stored(Request $request)
    {
        $msg = $request->input('codeDip');
        return redirect()->route('responsablecours.create',$msg);
   
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {   
        $request->validate(['idCours'=>'required','idEns'=>'required']);
        
        // Intervenir::create($request->all());
        DB::table('intervenirs')->insert([
            ['idEns' => $request->input('idEns'), 'idCours' => $request->input('idCours'),'resp' => '0']
        ]);
        // dd('bonjour');
        return redirect()->route('responsablecours.index')->with('success','Enseignant a ajouté avec succéss');
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
