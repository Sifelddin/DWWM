<?php

class Agence {
    public $_agence_nom;
    public $_agence_adresse;
    public $_agence_CP;
    public $_agence_ville;
    public $_agence_restaurant;

    function __construct(string $mag_nom,string $mag_adresse, int $mag_CP,string $mag_ville,bool $mag_restaurant)
    {
        $this->_agence_nom = $mag_nom;
        $this->_agence_adresse = $mag_adresse;
        $this->_agence_CP = $mag_CP;
        $this->_agence_ville = $mag_ville;
        $this->_agence_restaurant = $mag_restaurant;
    }
}


$afpa_Amiens = new Agence("AFPA","30 Rue paulainville",80000 ,"Amiens", true);

