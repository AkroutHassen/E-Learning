<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
                return view('Admin.layouts.template', compact('user'));
                break;
            case '1':
                return view('Enseignant.layouts.template', compact('user'));
                break;
            case '2':
                $userData = Etudiant::where('id', $user->id)->get();
                session(['id' => $userData[0]->id]);
                session(['prenom' => $userData[0]->prenom]);
                session(['email' => $userData[0]->email]);
                session(['login' => $userData[0]->login]);
                session(['numGroupe' => $userData[0]->numGroupe]);
                session(['codeDip' => $userData[0]->codeDip]);
                return redirect()->route('infos.show', session('id'));
                break;
            default:
                # code...
                break;
        }
    }
}
