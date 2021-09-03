<?php

spl_autoload_register('AutoLoad');

function AutoLoad($className){
   $url = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
   if(strpos($url,'includes') !== false){
       $path = '../class/';
   }else{
       $path = 'class/';
   }
   $extension = '.class.php';
   require_once $path . $className . $extension;
}

