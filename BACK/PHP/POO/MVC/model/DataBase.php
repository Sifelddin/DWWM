<?php

namespace app\model;

use PDO;
use PDOException;

class DataBase{


    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $database = 'jarditou';
   

    protected function connect ()
    {
        try {
       $pdo =  new PDO('mysql:host='. $this->host . ';dbname='.$this->database . ';charset=utf8',$this->user,$this->pwd,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
   


    


// $db = new PDO('mysql:host=localhost;dbname=jarditou;charset=utf8',$user,$motPass,[
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
// ]);

}