<?php

namespace Controller;

use Model\Products;

require_once ('../model/Products.class.php');

class Pro_contr extends Products{

    public function show_pros($in_page,$offset)
    {
        return $this->getProducts($in_page,$offset);
    }
    public function show_pros_count() 
    {
        return $this->count_pros();
    }
    public function show_search_pro($pro_libelle,$in_page , $offset)
    {
      return $this->search_pro($pro_libelle,$in_page , $offset);
    }
   //admin page
    public function admin_getProducts()
    {
      return $this->getProducts_admin();
    }
    public function admin_search($pro_libelle)
    {
      return $this->search_admin($pro_libelle);
    }
    public function setProduct($categorie ,$ref,$libelle,$description,$prix,$stock,$couleur,$ext_photo,$pro_bloque)
    {
        return $this->set_products($categorie,$ref,$libelle,$description,$prix,$stock,$couleur,$ext_photo,$pro_bloque);
    }

}