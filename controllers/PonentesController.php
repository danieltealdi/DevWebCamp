<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
    public static function index(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');}
        $ponentes = Ponente::all();
        //$ponentes = [];
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes
        ]);
    }
    public static function crear(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');}
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
        $ponente = new Ponente();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()){
                header('Location: /login');}
            //convertir el arreglo de redes en un string json para que no falle la validación
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            //debuguear($_POST);
            $ponente->sincronizar($_POST);
            //debuguear($ponente);
            $alertas = $ponente->validar();
            //debuguear($alertas);
            if(empty($alertas)) {

                $imagen_png->save($carpetaImagenes.'/'.$nombre_imagen.'.png');
                $imagen_webp->save($carpetaImagenes.'/'.$nombre_imagen.'.webp');
                $resultado = $ponente->guardar();
                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente ?? null,
            'redes' => json_decode($ponente->redes)
        ]);
    }
    public static function editar(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');}
        $alertas = [];
        $ponente = '';
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin/ponentes');
        }
        $ponente = Ponente::find($id);
        if(!$ponente) {
            header('Location: /admin/ponentes');
        }
        $ponente->imagen_actual = $ponente->imagen;
        $redes = json_decode($ponente->redes);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()){
                header('Location: /login');}
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
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }
            //convertir el matriz de redes en un string json para que no falle la validación
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();
            //debuguear($alertas);
            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpetaImagenes.'/'.$nombre_imagen.'.png');
                    $imagen_webp->save($carpetaImagenes.'/'.$nombre_imagen.'.webp');
                }
                $resultado = $ponente->guardar();
                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }

        }
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar Ponente',
            'ponente' => $ponente,
            'redes' => $redes
        ]);
    }
    public static function eliminar()
    {
        if(!is_admin()){
            header('Location: /login');}
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()){
                header('Location: /login');}
            $id = $_POST['id'];
            $ponente = Ponente::find($id);
            if(!isset($ponente)) {
                header('Location: /admin/ponentes');
            }
            $resultado = $ponente->eliminar();
            if($resultado) {
                header('Location: /admin/ponentes');
            }
        }
    }
}
