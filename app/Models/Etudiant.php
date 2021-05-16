<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom','prenom','email','login','mdp','tel','numGroupe','adresse','codeDip'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class);
    }
}
