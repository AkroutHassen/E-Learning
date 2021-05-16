<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'nom', 'desc', 'codeDip', 'coefExam', 'coefDip', 'nbHeures'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class);
    }
}
