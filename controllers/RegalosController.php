<?php

namespace Controllers;

use MVC\Router;

class RegalosController
{
    public static function index(Router $router)
    
    {
        //debuguear('aqui');
        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos',
        ]);
    }
}
