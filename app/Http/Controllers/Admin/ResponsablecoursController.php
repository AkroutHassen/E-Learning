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
       
        $responsablecours = Intervenir::where('resp','0')->get();
        return view('Admin.responsablecours.index',compact('responsablecours'));
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
        $coursdip = Cours::where('codeDip',$msg)->get();
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
        return redirect()->route('responsablecours.index')->with('success','La responsabilité a été ajouté avec succéss');
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
        
        $diplomes = Diplome::all();
        $enseignants=Enseignant::all();
        $cours=Cours::all();
        $codeDip;
        if(isset($tableau[2])){
            $codeDip = $tableau[2];
        } else {
            $codeDip;
            $codeDip = Cours::where('id',$idCours)->first('codeDip');
            
            // foreach ($diplomes as $diplome) {
            //     if ($idCours == $diplome->id ){
            //         $codeDip= $diplome->id;
            //         break;
            //     }
                    
            // }
        }
        
        
        $coursdip = Cours::where('codeDip',$codeDip->codeDip)->get();
        $responsables = Intervenir::all();
        $responsablecour = Intervenir::where('idCours',$idCours)->where('idEns',$idEns)->first();
        return view('Admin.responsablecours.edit',compact(['responsablecour','enseignants','coursdip','responsables']));
    
    }
    public function editd($id)
    {
        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];
        $diplomes = Diplome::all();
       
        $codeDip=[];
    
            foreach ($diplomes as $diplome) {
                if ($idCours == $diplome->id )
                $codeDip[$idCours] = $diplome->id;
            }
        
        $responsables = Intervenir::all();
        $responsablecour;
        foreach ($responsables as $responsable) {
            if($responsable->idCours == $idCours && $responsable->idEns == $idEns){
                $responsablecour = $responsable;
            }
        }
        return view('Admin.responsablecours.editd',compact(['diplomes','responsablecour','codeDip']));
    
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervenir  $intervenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   
        $request->validate(['idEns'=>'required','idCours'=>'required']);

        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];

        DB::table('intervenirs')
            ->where('idEns', $idEns)->where('idCours',$idCours)
            ->where('resp','0')
            ->update(['idEns'=>$request->input('idEns'),
                'idcours'=>$request->input('idCours')]);
        
        return redirect()->route('responsablecours.index')->with('success','La responsabilité a été modifié avec succéss');
   
    }
    public function updated(Request $request,$id)
    {
        $request->validate(['codeDip'=>'required']);

        $tableau = explode(",",$id);
        $idEns = $tableau[0];
        $idCours = $tableau[1];

        // DB::table('intervenirs')
        //     ->where('idEns', $idEns)->where('idCours',$idCours)
        //     ->where('resp',$resp)
        //     ->update(['codeDip'=>$request->input('codeDip')]);
            $msg = [$idEns,$idCours,$request->input('codeDip')];
            $msgs = implode(",",$msg);
        return redirect()->route('responsablecours.edit',[$msgs,$idEns])->with('success','La responsabilité a été modifié avec succéss');
   
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
        // DB::table('intervenirs')->delete([
        //     ['idEns' => $idEns, 'idCours' => $idCours,'resp' => $resp]
        // ]);
        DB::table('intervenirs')->where('idEns', $idEns)->where('idCours', $idCours)->where('resp', '0')->delete();
        return redirect()->route('responsablecours.index')->with('success','La responsabilité a été supprimé avec succéss');

    }
}
