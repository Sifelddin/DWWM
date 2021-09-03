<?php
include 'auto_load.php';
// $chiff1 = $_POST['num1'];
// $oper = $_POST['oper'];
// $chiff2 = $_POST['num2'];

// $calcul = new Calculator( (int)$chiff1 ,(string)$oper , (int)$chiff2);

// echo $calcul->do_calc();

$payment = new Payment();
var_dump($payment->pay());

?>