<?php

namespace app\Controllers;

use app\Router;
use Model\Products;

class ProController{

    public static function index(Router $router)
    {
       
       $products = $router->db->getProducts();
    
        $router->renderView('products/index',[
            'product' => $products
        ]);
            
       
    }
    public static function create()
    {
        echo "create page";

    }
    public static function update()
    {
        echo "update page";
    }
    public static function delete()
    {
        echo "delete page";
    }

}