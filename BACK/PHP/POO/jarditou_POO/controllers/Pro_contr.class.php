<?php
require_once ('../models/Products.class.php');

class pro_contr extends Products{

    

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
 
    

}