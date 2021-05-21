<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

    protected $fillable = [
        'idEtu', 'idCours'
    ];

    public function cours()
    {
        return $this->belongsTo(cours::class, 'idCours');
    }

    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'idEtu');
    }
}
