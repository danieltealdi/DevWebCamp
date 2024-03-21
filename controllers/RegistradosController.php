<?php

namespace Controllers;

use MVC\Router;

class RegistradosController
{
    public static function index(Router $router)
    
    {
        //debuguear('aqui');
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
        ]);
    }
}
