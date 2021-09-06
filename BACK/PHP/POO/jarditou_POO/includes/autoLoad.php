<?php

spl_autoload_register('autoloader');

function autoloader($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $path = '../controllers/';
    $extension = ".class.php";
    
    require_once  $path . $className . $extension;
}


