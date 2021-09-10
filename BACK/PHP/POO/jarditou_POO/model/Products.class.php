<?php

namespace Model;
use PDO;
require_once 'Dbh.class.php';

    class Products extends Dbh {

       
        //admin page
        protected function getProducts_admin()
        {
            $req = $this->connect()->prepare("SELECT * FROM produits");
            $req->execute();
            $results = $req->fetchAll();
            return $results;
        }
        protected function search_admin($pro_libelle)
        {
            $req = $this->connect()->prepare("SELECT * FROM produits WHERE pro_libelle LIKE '$pro_libelle%'");
            $req->execute();
            $results = $req->fetchAll();
            return $results;
        }

        //view page
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
        protected function set_products($categorie ,$ref,$libelle,$description,$prix,$stock,$couleur,$ext_photo,$pro_bloque)
        {
            $request = $this->connect()->prepare('INSERT INTO produits (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_d_modif,pro_bloque)
         VALUES (:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,:pro_couleur,:pro_photo,:pro_d_ajout,:pro_d_modif,:pro_bloque)');
        $request->execute([
            'pro_cat_id' => $categorie,
            'pro_ref' => $ref,
            'pro_libelle' => $libelle,
            'pro_description' => $description,
            'pro_prix' => $prix,
            'pro_stock' => $stock,
            'pro_couleur' => $couleur,
            'pro_photo' => $ext_photo,
            'pro_d_ajout' => date("Y-m-d H:i:s"),
            'pro_d_modif' => date("Y-m-d H:i:s"),
            'pro_bloque' => $pro_bloque
        ]);
        }


    }