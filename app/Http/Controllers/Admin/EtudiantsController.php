<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Diplome;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;


class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants=Etudiant::all();
        return view('Admin.etudiants.index',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $diplomes=Diplome::all();
        // $groupes=Groupes::all();
        return view('Admin.etudiants.create',compact('diplomes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nom'=>'required','prenom'=>'required',
                            'email'=>'required','login'=>'required','mdp'=>'required']);
        
        $mdp = Hash::make($request->input('mdp'));
        DB::table('users')->insert([
            [ 'role' => '2' ,
            'login' =>$request->input('login'),
            'email' => $request->input('email'),
            'password' => $mdp
            ]
        ]);
        
        $user_id = DB::table('users')->where('login', $request->input('login'))->first()->id;
        //    dd($id[0]);
            // Enseignant::create(['id'=> $id[0]]);
            DB::table('etudiants')->insert([
                [   'id' => $user_id ,
                    'nom'=> $request->input('nom'),
                    'prenom'=> $request->input('prenom'),
                    'email'=> $request->input('email'),
                    'login'=> $request->input('login'),
                    'codeDip'=> $request->input('codeDip'),
                    'tel'=> $request->input('tel')
                ]
            ]);
        
        return redirect()->route('etudiant.index')->with('success','Etudiant ' . $request->input('nom').' '. $request->input('prenom') .' a ajouté avec succéss');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $diplomes=Diplome::all();
        return view('Admin.etudiants.show',compact(['etudiant','diplomes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $diplomes=Diplome::all();
        $etuCodeDip = Etudiant::where('id',$etudiant->id)->first();
        $groupes = Groupe::all();
        return view('Admin.etudiants.edit',compact(['etudiant','diplomes','etuCodeDip','groupes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Etudiant $etudiant)
    {
        $request->validate(['email'=>'required','login'=>'required']);
    // $etudiant = Etudiant::findOrFail($id);
    if ($request->input('mdp') != null)
    {
        $mdp = Hash::make($request->input('mdp'));
        DB::table('users')
            ->where('id', $etudiant->id)
            ->update(['login' =>$request->input('login'),
            'email' => $request->input('email'),
            'password' => $mdp]);
        
    }else {
        DB::table('users')
            ->where('id', $etudiant->id)
            ->update(['login' =>$request->input('login'),
            'email' => $request->input('email'),
            ]);
    }
        
        $etudiant->update($request->except('mdp'));
        return redirect()->route('etudiant.index')->with('success','L\'Etudiant ' . $request->input('nom').' '. $request->input('prenom') .' est modifié avec succéss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {   $user = User::find($etudiant->id);
        $user->delete();
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success','L\'Etudiant est supprimé avec succéss');
    }
}
