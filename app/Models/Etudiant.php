<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{   protected $primaryKey = 'id';
    protected $fillable = [
        'nom','prenom','email','login','tel','numGroupe','adresse','codeDip'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class,'codeDip');
    }
}
