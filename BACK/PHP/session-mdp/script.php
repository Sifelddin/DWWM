<?php
session_start();
echo '<pre>';
var_dump($_SESSION);
var_dump($_POST);
echo '</pre>';
$email = $_POST['email'];
$password = $_POST['password'];



if($email === $_SESSION['login']['email'] && $password === $_SESSION['login']['password']){
header('Location:./index.php?message=success');
}else{
    header('Location:./app.php?error=error');
}






?>