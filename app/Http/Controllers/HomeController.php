<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        switch ($user->role) {
            case '0':
                session(['id' => $user->id]);
                session(['prenom' => $user->login]);
                session(['email' => $user->email]);
                session(['login' => $user->login]);
                session(['role' => $user->role]);
                return redirect()->route('welcome');
                //return view('Admin.layouts.template', compact('user'));
                break;
            case '1':
                $userData = Enseignant::where('id', $user->id)->first();
                if(empty($userData))
                {
                    Enseignant::insert([
                        'id' => $user->id,
                        'nom' => 'Enseignant',
                        'prenom' => 'Enseignant',
                        'email' => $user->email,
                        'login' => $user->login,
                        'grade' => 'PR'
                    ]);
                    $userData = Enseignant::where('id', $user->id)->first();
                }
                session(['id' => $userData->id]);
                session(['prenom' => $userData->prenom]);
                session(['nom' => $userData->nom]);
                session(['email' => $userData->email]);
                session(['login' => $userData->login]);
                session(['grade' => $userData->grade]);
                session(['role' => $user->role]);
                return redirect()->route('enseignant.infos.show', session('id'));
                break;
            case '2':
                $userData = Etudiant::where('id', $user->id)->first();
                if(empty($userData))
                {
                    Etudiant::insert([
                        'id' => $user->id,
                        'nom' => 'Etudiant',
                        'prenom' => 'Etudiant',
                        'email' => $user->email,
                        'login' => $user->login
                    ]);
                    $userData = Etudiant::where('id', $user->id)->first();
                }
                session(['id' => $userData->id]);
                session(['prenom' => $userData->prenom]);
                session(['nom' => $userData->nom]);
                session(['email' => $userData->email]);
                session(['login' => $userData->login]);
                session(['numGroupe' => $userData->numGroupe]);
                session(['codeDip' => $userData->codeDip]);
                session(['role' => $user->role]);
                return redirect()->route('etudiant.infos.show', session('id'));
                break;
            default:
                return redirect()->route('logout');
                break;
        }
    }
}
