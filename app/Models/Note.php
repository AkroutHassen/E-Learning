<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $primaryKey = 'idEtu';

    protected $fillable = [
        'idEtu', 'idCours', 'noteExam', 'noteTd', 'moy'
    ];

    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'idEtu');
    }

    public function cours()
    {
        return $this->belongsTo(cours::class, 'idCours');
    }

}
