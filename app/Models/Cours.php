<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'nom','desc','codeDip','coefExam','coefTd','nbHeures'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class,'codeDip');
    }
}
