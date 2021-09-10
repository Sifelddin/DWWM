<?php
namespace Model;

require_once ('Dbh.class.php');

class Categories extends Dbh {

    protected function getCats()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $cats = $stmt->fetchAll();
        return $cats;
    }
  
}

