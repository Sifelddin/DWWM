<?php

class AutoLoad{


    static function register(){
      
        spl_autoload_register([__CLASS__,'autoloader']);
    }

    static function autoloader($class){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $path = '../Controllers/';
    $extension = ".class.php";
    
    if(strpos($class,"Controller\\") !== false){
       $class = str_replace("Controller\\","",$class);
    }
    if(strpos($url,'forms') !== false){
        $path = '../../Controllers/';
    }
    // var_dump($path . $class . $extension);
    // echo "<br>";
    // var_dump($url);
    require_once  $path . $class . $extension;
}


}






