<?php

class Archer extends Character {
    public function __construct($pseudo) {
        $this->pseudo = $pseudo;
        $this->quiver = 4;
        $this->specialAtk = 1;
    }

    public function action($target) {
        //Verify if special attack wasn't actived
        if ($this->specialAtk == 1) {
            $rand = rand(1, 10);
            if ($rand >= 7 && $this->quiver >=1) {
                return $this->focus($target);
            } elseif ($rand >= 4 && $this->quiver >= 2) {
                return $this->double($target);
            } else {
                return $this->attack($target);
            }
        } else {
            return $this->attack($target);
        }
    }
   
    public function attack($target) {
        if ($this->quiver > 0) {
            $rand = rand(1, 20);
            $damage = ($this->atk + $rand) * $this->specialAtk;
            $target->setHP($damage);
            $this->quiver -= 1;
            $target->isAlive();
            $status = "$this->pseudo attaque $target->pseudo avec $this->specialAtk qui a $target->lifePoint points de vie!";
            $this->specialAtk = 1; //Reset Special Attack
            return $status;
        } else {
            $target->setHP($this->atk);
            $target->isAlive();
            $status = "$this->pseudo n'a plus de flèches et attaque avec sa dague $target->pseudo qui a $target->lifePoint points de vie!";
            return $status;
        }
        
        
    }

    public function focus($target){
        $rand = rand(15, 30)/10;
        $this->specialAtk = $rand;
        $status = "$this->pseudo a trouvé un point faible à $target->pseudo...";
        return $status;

    }

    public function double($target){
        $this->specialAtk = 2;
        $this->quiver -= 1;
        $status = "$this->pseudo sort deux flèches de son carquois...";
        return $status;

    }


    public function setHP($damage) {
        $this->lifePoint -= $damage;
        return $this->lifePoint;
    }
}