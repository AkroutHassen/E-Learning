<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Groupe;
use App\Models\Diplome;
use App\Models\Intervenir;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupesController extends Controller
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
        $groupes=Groupe::all();
        $diplomes=Diplome::all();
        return view('Admin.groupes.index',compact(['groupes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diplomes=Diplome::all();
        return view('Admin.groupes.create',compact('diplomes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(['codeDip'=>'required','id'=>'required']);
        Groupe::create($request->all());
        return redirect()->route('groupe.index')->with('success','Groupe ' . $request->input('codeDip').' TD '. $request->input('id') .' a été ajouté avec succéss');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupes  $groupes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $tableau = explode(",",$id);
        $groupeid = $tableau[0];
        $groupeDip = $tableau[1];
        $etudiants = Etudiant::where('codeDip',$groupeDip)->where('numGroupe',$groupeid)->get();
        return view('Admin.groupes.show',compact('etudiants')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupes  $groupes
     * @return \Illuminate\Http\Response
     */
    // public function edite(Groupes $dip)
    // {   dd('bonjour');
    //     // $diplomes=Diplome::all();
    //     // return view('Admin.groupes.edit',compact(['groupes','diplomes']));
    // }
   
    public function edit($id)
    {  
        
        // $tableau = Groupe::FindorFail($id);
        $tableau = explode(",",$id);
        $groupeid = $tableau[0];
        $groupeDip = $tableau[1];
        $diplomes=Diplome::all();
        $groupe = Groupe::where('id',$groupeid)->where('codeDip',$groupeDip)->first();
        return view('Admin.groupes.edit',compact(['groupe','diplomes']));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupes  $groupes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
       
        $request->validate(['codeDip'=>'required','id'=>'required']);

        $tableau = explode(",",$id);
        $groupeid = $tableau[0];
        $groupeDip = $tableau[1];
        $groupes = Groupe::all();

        DB::table('groupes')->where('id', $groupeid)->where('codeDip',$groupeDip)->update(['id'=>$request->input('id'),'codeDip'=>$request->input('codeDip')]);
        return redirect()->route('groupe.index')->with('success','Le Groupe ' . $request->input('num') .' a été modifié avec succéss');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupes  $groupes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('groupe.index')->with('success','Le Groupe a été supprimé avec succéss');
    }
}
