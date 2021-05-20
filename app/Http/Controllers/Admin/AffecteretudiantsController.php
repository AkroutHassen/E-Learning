<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;
class AffecteretudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $affectes = Etudiant::where('codeDip','<>', null)->where('numGroupe',null)->get();
        $idEtus = [];
        foreach($affectes as $affect){
            array_push($idEtus, $affect->id );
        }
        $idEtu = implode(',',$idEtus);
        $groupes = Groupe::all();
        return view('Admin.affecterEtudiant.index',compact('affectes','groupes','idEtu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tableau = explode(",",$id);
        $i = 0;
        foreach($tableau as $etudiant){
            $i++;
            DB::table('etudiants')
            ->where('id', $etudiant)
            ->update(['numGroupe' =>$request->input('numGroupe'.$i)]);
        }
        return redirect()->route('affecter.index')->with('success','Affectation success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
