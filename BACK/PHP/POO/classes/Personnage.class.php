<?php

class Personnage{
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    function setNom($nom , $prenom, $age , $sexe){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
        $this->_sexe = $sexe;

        
    }

    function getNom(){
        return  "mon nom est $this->_nom , mon prenom est $this->_prenom , j'ai $this->_age , je suis $this->_sexe ";
    }
  

}

$ali = new Personnage;
$ali->setNom("ali","tarek",27,"M");
var_dump($ali);
