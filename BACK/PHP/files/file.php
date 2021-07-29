<?php

// $my_var = "bonjour le monde";
// $fp = fopen("test.txt", "a");
// fputs($fp, $my_var);
// fclose($fp);
$zero = 0;
$file = "compteur.txt";
//$fp = fopen("compteur.txt", "r+");
$fp = fputs($file, $zero);
echo ($fp);
$visiteurs = fgets($fp, 255);
$visiteurs++;
fseek($fp, 0);
fputs($fichier, $visiteurs);
fclose($fichier);
