<?php

class Agence {
    public $_agence_nom;
    public $_agence_adresse;
    public $_agence_CP;
    public $_agence_ville;
    public $_agence_restaurant;

    function __construct(string $nom,string $adresse, int $CP,string $ville,bool $restaurant)
    {
        $this->_agence_nom = $nom;
        $this->_agence_adresse = $adresse;
        $this->_agence_CP = $CP;
        $this->_agence_ville = $ville;
        $this->_agence_restaurant = $restaurant;
    }
}


$afpa_Amiens = new Agence("AFPA","30 Rue paulainville",80000 ,"Amiens", true);

var_dump($afpa_Amiens);