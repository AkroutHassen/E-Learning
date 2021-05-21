<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{

    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'nom', 'prenom', 'email', 'login', 'tel', 'adresse', 'numGroupe', 'codeDip',
   ];

   public function diplome()
   {
       return $this->belongsTo(diplome::class, 'codeDip');
   }
}
