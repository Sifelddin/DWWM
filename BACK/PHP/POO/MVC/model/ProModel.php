<?php

namespace app\model;

class ProModel extends DataBase{

   

    public function getProducts()
    {
        $req = $this->connect()->prepare("SELECT * FROM produits");
        $req->execute();
        $results = $req->fetchAll();
        return $results;
    }
  

}