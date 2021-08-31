<?php
date_default_timezone_set("Europe/Paris");

$liste_employes = [];

class Employe {
    public $_nom;
    public $_prenom;
    public $_date_embouche;
    public $_poste;
    public $_salaire_brut_annual;
    public $_service;
   

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
      
      return 'ça fait '. $date_embouche->diff($date_now)->y .' ans dans l\'entreprise';

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
        $date_embouche = new DateTime($this->_date_embouche) ; 
        $date_now = new DateTime();
        $annees_anciennete = $date_embouche->diff($date_now)->y;

        //calculer la prime
        $prime_salaire = $salaire_brut * ( $prime_salaire_taux );
        $prime_anciennete  =  $annees_anciennete * ($salaire_brut * ( $prime_anciennete_taux ));
        $prime_totale = $prime_salaire +  $prime_anciennete;

        if(strftime("%e/%m", strtotime($date_now->format("m/d"))) == "30/11"){
            return " l’ordre de transfert a été envoyé à 
            la banque avec mention du montant : <br><strong>". $prime_totale . "</strong> €";
        }else{
        return "la prime  va étre envoyé le 30/11";
        }
    }

    static function nomber_employes(array $liste)
    {
        return "le nombre d'employes est : <strong>". count($liste) . "</strong>";
    }


}

$hassan = new Employe("hassan","ali","05-05-2018","gérant",30000,"administration");
$sifou = new Employe("sifou","tarek","03-05-2016","comptable",28000,"Comptabilité");
$doe = new Employe("Jhon","Doe","05-05-2015","gérant",25000,"Commercial");
$salah = new Employe("sallah","saad","06-07-2019","directeur commercial.",31000," commercial");
$lazhar = new Employe("lazhar","marchi","06-07-2019","agent sécurité",31000,"sécurité");
$liste_employes[] = $hassan;
$liste_employes[] = $sifou;
$liste_employes[] = $doe;
$liste_employes[] = $salah;
$liste_employes[] = $lazhar;


echo "<pre>";
var_dump(Employe::nomber_employes($liste_employes));
echo "</pre>";





