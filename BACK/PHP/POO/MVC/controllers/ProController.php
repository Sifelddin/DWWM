<?php

namespace app\Controllers;

use app\Router;

class ProController{

    public static function index(Router $router)
    {
        var_dump($router->db);
        $router->renderView('products/index');
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