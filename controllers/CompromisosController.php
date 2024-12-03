<?php 

namespace Controllers;

use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Compromiso;

class CompromisosController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $compromisos = Compromiso::all('ASC');

        $router->render('admin/dashboard/compromiso/index', [
            'titulo' => 'Compromisos',
            'compromisos' => $compromisos
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $compromiso = new Compromiso;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/compromisos';
            
                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_jpg = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('jpg', 90);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 90);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            $compromiso->sincronizar($_POST);
            $alertas = $compromiso->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar las imagenes
                $imagen_jpg->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $resultado = $compromiso->guardar();

                if($resultado) {
                    header('Location: /admin/dashboard/compromiso');
                }
            }
        }

        $router->render('admin/dashboard/compromiso/crear', [
            'titulo' => 'Crear Compromiso',
            'alertas' => $alertas,
            'compromiso' => $compromiso
        ]);
    }

    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];

        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/dashboard/compromiso');
        }

        $compromiso = Compromiso::find($id);

        if(!$compromiso) {
            header('Location: /admin/dashboard/compromiso');
        }

        $compromiso->imagen_actual = $compromiso->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/compromisos';

                // Eliminar la imagen previa
                unlink($carpeta_imagenes . '/' . $compromiso->imagen_actual . ".jpg" );
                unlink($carpeta_imagenes . '/' . $compromiso->imagen_actual . ".webp" );
                
                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_jpg = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen =md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $imagen_actual;
            }

            $compromiso->sincronizar($_POST);
            $alertas = $compromiso->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    // Guardar las imagenes
                    $imagen_jpg->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                // Guardar en la BD
                $resultado = $compromiso->guardar();

                if($resultado) {
                    header('Location: /admin/dashboard/compromiso');
                }
            }
        }

        $router->render('admin/dashboard/compromiso/editar', [
            'titulo' => 'Editar Compromiso',
            'alertas' => $alertas,
            'compromiso' => $compromiso
        ]);
    }

    public static function eliminar() {
        if(!is_admin()) {
            header('Location: /login');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $compromiso = Compromiso::find($id); 

            if(!isset($compromiso)) {
                header('Location: /admin/dashboard/compromiso');
            }

            if ($compromiso->imagen) {
                $carpeta_imagenes = '../public/img/compromisos';
                unlink($carpeta_imagenes . '/' . $compromiso->imagen . ".jpg");
                unlink($carpeta_imagenes . '/' . $compromiso->imagen . ".webp");
            }

            $resultado = $compromiso->eliminar();
            

            if($resultado){
                header('Location: /admin/dashboard/compromiso');
            }
        }

    }
}