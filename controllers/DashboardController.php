<?php

namespace Controllers;

use MVC\Router;

class DashboardController
{
    public static function index(Router $router)
    
    {
        //debuguear('aqui');
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
        ]);
    }
}
