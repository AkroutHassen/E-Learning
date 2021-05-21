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
        $responsabletds = Intervenir::where('resp','<>',0)->get();
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
        return redirect()->route('responsabletd.index')->with('success','La responsabilité a été ajouté avec succéss');

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
    public function edit($id)
    {
        $tableau = explode(",",$id);
        
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $resp = $tableau[2];
        $cours=Cours::all();
        $codeDip ;
        $enseignants = Enseignant::all();
        if(isset($tableau[3])){
            $codeDip = $tableau[3];
        } else {
            $codeDip = Cours::where('id',$idCours)->first('codeDip');
           
        }
        $coursdip = Cours::where('codeDip',$codeDip->codeDip)->get();
        $groupesdip = Groupe::where('codeDip',$codeDip->codeDip)->get();
        $responsabletd = Intervenir::where('idCours',$idCours)->where('idEns',$idEns)->where('resp',$resp)->first();
        return view('Admin.responsabletds.edit',compact(['responsabletd','enseignants','coursdip','responsables','groupesdip']));
    
        }

    public function editd($id)
    {
        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $resp = $tableau[2];
        $diplomes = Diplome::all();
        $codeDip = Cours::where('id',$idCours)->get('codeDip');
        $responsabletd = Intervenir::where('idCours',$idCours)->where('idEns',$idEns)->where('resp',$resp)->first();
        return view('Admin.responsabletds.editd',compact(['diplomes','responsabletd','codeDip']));
    
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(['idEns'=>'required','idCours'=>'required','resp'=>'required']);

        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $resp = $tableau[2];

        DB::table('intervenirs')
            ->where('idEns', $idEns)->where('idCours',$idCours)
            ->where('resp',$resp)
            ->update(['idEns'=>$request->input('idEns'),
                'idcours'=>$request->input('idCours'),
                'resp'=>$request->input('resp')]);
        
        return redirect()->route('responsabletd.index')->with('success','La responsabilité a été modifié avec succéss');
   
    }

    public function updated(Request $request,$id)
    {
        $request->validate(['codeDip'=>'required']);

        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $resp = $tableau[2];

        
            $msg = [$idEns,$idCours,$resp,$request->input('codeDip')];
            $msgs = implode(",",$msg);
        return redirect()->route('responsabletd.edit',[$msgs,$idEns])->with('success','La responsabilité a été modifié avec succéss');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $resp = $tableau[2];
        DB::table('intervenirs')->where('idEns', $idEns)->where('idCours', $idCours)->where('resp', $resp)->delete();
        return redirect()->route('responsabletd.index')->with('success','La responsabilité a été supprimé avec succéss');

    }
}
