<?php

namespace Controller;

require_once ('../model/Categories.class.php');

use Model\Categories;

class Cat_cont extends Categories{

    public function show_cats()
    {
     return $this->getCats();
    }
}
