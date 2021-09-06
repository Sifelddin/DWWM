<?php

class Dbh {

    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $database = 'jarditou';


    protected function connect ()
    {
        $db =new PDO('mysql:host='. $this->host . ';dbname='.$this->database . ';charset=utf8',$this->user,$this->pwd,
         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        return $db;
    }

   
}