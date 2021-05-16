<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervenir extends Model
{
    protected $fillable = [
        'idEns','idCours','res'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class);
    }
    public function enseignant(){
        return $this->belongsTo(enseignant::class);
    }
}
