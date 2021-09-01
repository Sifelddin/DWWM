<?php
date_default_timezone_set("Europe/Paris");
require 'Agence.class.php';


class Employe extends Agence {
    public $_nom;
    public $_prenom;
    public $_date_embouche;
    public $_poste;
    public $_salaire_brut_annual;
    public $_service;
    public static $liste_employes = [];
   

    function __construct($nom,$prenom,$date_embouche,$poste,$salaire_brut_annual,$service)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date_embouche = $date_embouche;
        $this->_poste = $poste;
        $this->_salaire_brut_annual = $salaire_brut_annual;
        $this->_service = $service;
    }

    public  function annees_dans_entreprise()
    {
      $date_embouche = new DateTime($this->_date_embouche) ; 
      $date_now = new DateTime(); 
      return  $date_embouche->diff($date_now)->y;

    }

    function prime_annuel()
    {
      
        //déclaration des variables
        $prime_anciennete = 0;
        $prime_salaire = 0;
        $prime_totale = 0 ;
        $prime_salaire_taux= 5/100;
        $prime_anciennete_taux = 2/100;
        $salaire_brut = $this->_salaire_brut_annual;
        //trouver l’ancienneté (nombre d'anneés) 
        $annees_anciennete = $this->annees_dans_entreprise();
        //calculer la prime
        $prime_salaire = $salaire_brut * ( $prime_salaire_taux );
        $prime_anciennete  =  $annees_anciennete * ($salaire_brut * ( $prime_anciennete_taux ));
        $prime_totale = $prime_salaire +  $prime_anciennete;
        return $prime_totale;
    }

    function prime_annuel_message(){
        
        $date_now = new DateTime();
        if(strftime("%e/%m", strtotime($date_now->format("m/d"))) == "30/11"){
            return " l’ordre de transfert a été envoyé à 
            la banque avec mention du montant : <br><strong>". $this->prime_annuel() . "</strong> €";
        }else{
        return "la prime  va étre envoyé le 30/11";
        }

    }


    static function nomber_employes(array $liste)
    {
        return "le nombre d'employes est : <strong>". count($liste) . "</strong>";
    }

    static function cmp_service($a,$b){
        $al = strtolower($a->_service);
        $bl = strtolower($b->_service);
        if($al == $bl){
            return 0;
        }
        return $al > $bl ? 1 : -1;
    }
    static function cmp_prenom($a,$b){
        $al = strtolower($a->_prenom);
        $bl = strtolower($b->_prenom);
        if($al == $bl){
            return 0;
        }
        return $al > $bl ? 1 : -1;
    }
    static function cmp_nom($a,$b){
        $al = strtolower($a->_nom);
        $bl = strtolower($b->_nom);
        if($al == $bl){
            return 0;
        }
        return $al > $bl ? 1 : -1;
    }
    
    public static function employes_infos($sort_val){
        if($sort_val == "nom"){
        usort(self::$liste_employes,array('Employe','cmp_nom'));
        }elseif($sort_val == "prenom"){
        usort(self::$liste_employes,array('Employe','cmp_prenom'));
         }elseif($sort_val == "service"){
        usort(self::$liste_employes,array('Employe','cmp_service'));
    }else {
        echo "les valeur disponobles sont : nom , prenom , service";
    }
     print_r(self::$liste_employes);
    }

    public static function cout_total()
    {    
        //déclaration des variables
        $cout_total = 0;

       foreach(self::$liste_employes as $employe){
           $prime = $employe->prime_annuel(); 
           var_dump($employe->_salaire_brut_annual);
           var_dump($prime);
           $cout_total += $prime + $employe->_salaire_brut_annual;
       };
      return $cout_total;
    }

}

$hassan = new Employe("hassan","ali","05-05-2018","gérant",30000 ,"administration");
$sifou = new Employe("sifou","tarek","03-05-2016","comptable",28000,"Comptabilité");
$doe = new Employe("Jhon","Doe","05-05-2015","gérant",25000,"Commercial");
$salah = new Employe("sallah","saad","06-07-2019","directeur commercial.",31000," commercial");
$lazhar = new Employe("lazhar","marchi","06-07-2019","agent sécurité",24000,"sécurité");

Employe::$liste_employes[] = $doe;
Employe::$liste_employes[] = $hassan;
Employe::$liste_employes[] = $lazhar;
Employe::$liste_employes[] = $sifou;
Employe::$liste_employes[] = $salah;

$hassan = $afpa_Amiens;



echo "<pre>";
var_dump($hassan->_agence_restaurant = true);
var_dump($sifou->_agence_restaurant = false);
var_dump($doe->_agence_restaurant = true);
var_dump($salah->_agence_restaurant = false);
var_dump($lazhar->_agence_restaurant = true);

var_dump( $hassan);

echo "</pre>";



