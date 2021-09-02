<?php 
require 'Employe.class.php';

class Directeur extends Employe {
    
   private  $_prime_anciennete_taux = 3/100 ;
   private  $_prime_salaire_taux = 7/100;

   public function prime_annuel(){
    $prime_anciennete = 0;
    $prime_salaire = 0;
    $prime_totale = 0 ;
    $prime_salaire_taux = $this->_prime_salaire_taux;
    $prime_anciennete_taux = $this->_prime_anciennete_taux;
    $salaire_brut = $this->_salaire_brut_annual;
    //trouver l’ancienneté (nombre d'anneés) 
    $annees_anciennete = $this->annees_dans_entreprise();
    //calculer la prime
    $prime_salaire = $salaire_brut * ( $prime_salaire_taux );
    $prime_anciennete  =  $annees_anciennete * ($salaire_brut * ( $prime_anciennete_taux ));
    $prime_totale = $prime_salaire +  $prime_anciennete;
    return $prime_totale;
   }

}

$directeur = new Directeur("ayoub","ghani","05-05-2010","directeur",40000 ,"administration");

echo "<pre>";
echo($directeur->prime_annuel() . " €") . "\n";
echo($directeur->prime_annuel_message() . " €");
echo "</pre>";