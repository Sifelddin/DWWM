<?php
$password = "vacances";
$password_hash = password_hash("vacances", PASSWORD_DEFAULT);

if(password_verify($password , $password_hash)){
    echo 'password correct';
}else{
    echo 'error ';
}