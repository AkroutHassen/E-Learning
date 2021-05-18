<?php namespace App\Classes;

class Statistiques {
    private $x;
    private $y;

    public function __construct($x,$y){
        $this->x = $x;
        $this->y = $y;
       
    }
    
    public function setX($x){
        $this->x = $x;
    }
    public function getX(){
        return $this->x;
    }

    public function setY($Y){
        $this->Y = $Y;
    }
    public function getY(){
        return $this->Y;
    }

    public function count($database){
        $count = 0;
        foreach ($database as $line) {
            $count ++;
        }
        return $count;
    }

    public function nbVarPVar($cours,$diplomes){
        $count = [];
        foreach ($diplomes as $diplome) {
            $count[$diplome->id] = 0;
            foreach($cours as $cour){
                if($cour->codeDip == $diplome->id){
                    $count[$diplome->id]++;
                }
            }
        }
    
        return $count;
    }
    public function nomVarPVar($cours,$diplomes){
        $nom = [];
        foreach ($diplomes as $diplome) {
            $nom[$diplome->id] = [];
            foreach($cours as $cour){
                if($cour->codeDip == $diplome->id){
                    $nom[$diplome->id][$cour->id] = $cour->nom;
                }   
            }
        }

        return $nom;
    }

   


}
?>