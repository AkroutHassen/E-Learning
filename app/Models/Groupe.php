<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
        'codeDip','id'
    ];
    public function diplome(){
        return $this->belongsTo(diplome::class);
    }
}
