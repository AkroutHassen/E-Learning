<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants=Enseignant::all();
        return view('Admin.enseignants.index',compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.enseignants.create');
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
                            'email'=>'required','login'=>'required','mdp'=>'required',
                            'grade'=>'required','numBureau'=>'required']);
        $mdp = Hash::make($request->input('mdp'));
        
        DB::table('users')->insert([
            [ 
            'login' =>$request->input('login'),
            'email' => $request->input('email'),
            'password' => $mdp,
            'role' => '1'
            ]
        ]);
        $user_id = DB::table('users')->where('login', $request->input('login'))->first()->id;
    //    dd($id[0]);
        // Enseignant::create(['id'=> $id[0]]);
        DB::table('enseignants')->insert([
            [ 'id' => $user_id ,
                'nom'=> $request->input('nom'),
                'prenom'=> $request->input('prenom'),
                'email'=> $request->input('email'),
                'login'=> $request->input('login'),
                'grade'=> $request->input('grade'),
                'numBureau'=> $request->input('numBureau'),
                'tel'=> $request->input('tel')
            ]
        ]);
        return redirect()->route('enseignant.index')->with('success','Enseignant ' . $request->input('nom').' '. $request->input('prenom') .' a ajouté avec succéss');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        return view('Admin.enseignants.show',compact('enseignant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        return view('Admin.enseignants.edit',compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate(['nom'=>'required','prenom'=>'required',
                            'email'=>'required','login'=>'required',
                            'grade'=>'required','numBureau'=>'required']);
        // $etudiant = Etudiant::findOrFail($id);
        if ($request->input('mdp') != null)
        {
            $mdp = Hash::make($request->input('mdp'));
            DB::table('users')
            ->where('id', $enseignant->id)
            ->update(['login' =>$request->input('login'),
            'email' => $request->input('email'),
            'password' => $mdp
            ]);
            
        }else {
            DB::table('users')
            ->where('id', $enseignant->id)
            ->update(['login' =>$request->input('login'),
            'email' => $request->input('email'),
            ]);
        }
        $enseignant->update($request->except('mdp'));
        return redirect()->route('enseignant.index')->with('success','L\'Enseignant ' . $request->input('nom').' '. $request->input('prenom') .' est modifié avec succéss');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {   $user = User::find($enseignant->id);
        $user->delete();
        $enseignant->delete();
        return redirect()->route('enseignant.index')->with('success','L\'Enseignant est supprimé avec succéss');
    
    }
}
