<?php

namespace Controllers;

use MVC\Router;

class EventosController
{
    public static function index(Router $router)
    {
        //debuguear('aqui');
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
        ]);
    }
    public static function crear(Router $router)
    {
        if(!is_admin()) {
            header('Location: /login');
        }
        //leer imagen
        if(!empty($_FILES['imagen']['tmp_name'])) {
            $carpetaImagenes = '../public/img/ponentes';
            //debuguear ($carpetaImagenes);
            if(!is_dir($carpetaImagenes)) {
                //debuguear('no existe');
                //esto no funciona debe cambiarse el usuario de la carpeta
                //chown -R www-data:www-data public/
                $resultado = mkdir($carpetaImagenes, 0775, true);
                //debuguear(__DIR__.'/'.$carpetaImagenes);
            }
            //debuguear('ya existe');
            $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
            $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
            //debuguear($imagen_png);
            $nombre_imagen = md5(uniqid(rand(), true));
            //debuguear($nombre_imagen);

            $_POST['imagen'] = $nombre_imagen;
        }
        $alertas = [];
        $evento = new Evento();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            //convertir el arreglo de redes en un string json para que no falle la validación
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            //debuguear($_POST);
            $evento->sincronizar($_POST);
            //debuguear($evento);
            $alertas = $evento->validar();
            //debuguear($alertas);
            if(empty($alertas)) {

                $imagen_png->save($carpetaImagenes.'/'.$nombre_imagen.'.png');
                $imagen_webp->save($carpetaImagenes.'/'.$nombre_imagen.'.webp');
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }
        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'evento' => $evento ?? null,
            'redes' => json_decode($evento->redes)
        ]);
    }

}
