<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
        //var_dump($this->getRoutes['/login']);
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? "/public/";
        $url_actual = parse_url($url_actual)['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        //debuguear($url_actual);
        if ($method === 'GET') {
            $fn = $this->getRoutes[$url_actual] ?? null;
            //var_dump('url: '.$url_actual.' metodo: '.$method);
            //var_dump($this->getRoutes['/login']);
            //debuguear($fn);
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }
        //debuguear($fn);
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        //Utilizar layout de acuerdo a la url

        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? "/public/";
        $url_actual = parse_url($url_actual)['path'];
        //debuguear($url_actual);
        if(\str_contains($url_actual, '/admin')) {
            //debuguear('admin');
            include_once __DIR__ . '/views/admin-layout.php';
        }else {
            include_once __DIR__ . '/views/layout.php';
        }

        
    }
}
