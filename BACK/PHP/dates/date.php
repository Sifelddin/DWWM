<?php
date_default_timezone_set("Europe/Paris");
//Exercice 1
// setlocale(LC_TIME,"fr");


// print_r(strftime("%A %e %B %Y", strtotime("07/02/2019")));

//Exercice 2

// $date ="14-07-2019";
// echo date("W",strtotime($date));


//Exercice 3

// $C_date = new DateTime();
// $d_fin_f = new DateTime("11-02-2022");
// $diff = $d_fin_f->diff($C_date);
// $diff->days;

//Exercice 4

// $mkd = date("M-d-Y", mktime(0, 0, 0, 2, 11, 2022));
// $now = date("M-d-Y", mktime(0, 0, 0));
// $date_f = new DateTime($mkd);
// $d_now = new DateTime($now);
// $diff = $date_f->diff($d_now);
// print_r($diff->days);


//Exercice 5

// $y24 = "01-03-2024"; // 60 jours;
// $y23 = "01-03-2023"; // 59 jours;
// $y22 = "01-03-2022"; // 59 jours;

// $bissextile = date("z", strtotime($y24)); // 60 jours
// echo $bissextile;


//Exercice 6

// $date = "17-17-2019";
// $verify = new DateTime($date);

// print_r($verify);// throw error

//Exercice 7

// $date_now = new DateTime("NOW");

// print_r($date_now->format("G") . "h" . $date_now->format("i"));


//Exercice 8


// $now = new DateTime();
// $now->modify("+1 month");
// print_r($now);
