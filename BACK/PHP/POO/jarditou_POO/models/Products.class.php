<?php

require_once('Dbh.class.php');

    class Products extends Dbh {

       

        protected function getProducts($in_page , $offset)
        {
            $req = $this->connect()->prepare("SELECT * FROM produits limit $in_page OFFSET $offset");
            $req->execute();
            $results = $req->fetchAll();
            return $results;
        }
        protected function count_pros()
        {
            
            $count = $this->connect()->prepare("SELECT count(pro_id) from produits");
            $count->execute();
            $count_products = (int)$count->fetch(PDO::FETCH_NUM)[0];
            return $count_products;
        }

        protected function search_pro($pro_libelle,$in_page , $offset){
            $sql = "SELECT * FROM produits WHERE pro_libelle LIKE '$pro_libelle%' limit $in_page OFFSET $offset ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
            
        }

    }