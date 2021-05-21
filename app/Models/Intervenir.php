<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervenir extends Model
{
    protected $fillable = [

        'idEns','idCours','resp'

    ];

    public function cours(){

        return $this->belongsTo(cours::class, 'idCours');

    }

    public function enseignant(){

        return $this->belongsTo(enseignant::class, 'idEns');

    }
}
