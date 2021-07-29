<?php
date_default_timezone_set("Europe/Paris");
//Exercice 1
// setlocale(LC_TIME,"fr");

// print_r(strftime("%A %e %B %Y", strtotime("07/02/2019")));

//Exercice 2

// $date ="14-07-2019";


// echo date("W",strtotime($date));


//Exercice 3

$C_date = new DateTime();
$d_fin_f = new DateTime("11-02-2022");
$diff = $d_fin_f->diff($C_date);
$diff->days;

//Exercice 4

echo mktime(0,0,0,2,11,2022) - time();

