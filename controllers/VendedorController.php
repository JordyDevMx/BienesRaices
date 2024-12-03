<?php 

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Propiedad;
use Model\Ciudad;
use Model\Cliente;
use Model\Estado;
use Intervention\Image\ImageManagerStatic as Image;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Round;

class VendedorController {
    /** Propiedades **/

    public static function index(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        // Numero de pagina en la URL
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /vendedor/propiedad?page=1');
        }

        $por_pagina = 5;
        $total = Propiedad::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $propiedades = Propiedad::paginar($por_pagina, $paginacion->offset());

        $id = $_SESSION['id'];
        $propiedades = Propiedad::belongsTo('usuarios_id', $id);

        $router->render('admin/vendedor/propiedades/index', [
            'titulo' => 'Propiedades',
            'propiedades' => $propiedades,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear_propiedad(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        $alertas = [];
        $propiedad = new Propiedad;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_vendedor()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/propiedades';
                
                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_jpg = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('jpg', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }
            
            $propiedad->sincronizar($_POST);
            $alertas = $propiedad->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar las imagenes
                $imagen_jpg->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $propiedad->folio = date('Ymd') . str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
                $propiedad->creado = date('Y/m/d');
                $propiedad->usuarios_id = $_SESSION['id'];
                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('Location: /vendedor/propiedad');
                }
            }
        }

        $router->render('admin/vendedor/propiedades/crear', [
            'titulo' => 'Crear Propiedad',
            'alertas' => $alertas,
            'propiedad' => $propiedad
        ]);
    }

    public static function editar_propiedad(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        $alertas = [];

        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que sea numero entero

        if(!$id) {
            header('Location: /vendedor/propiedad');
        }

        // Obtener propiedad a Editar
        $propiedad = Propiedad::find($id);

        if(!$propiedad) {
            header('Location: /vendedor/propiedad');
        }

        $propiedad->imagen_actual = $propiedad->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_vendedor()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/propiedades';

                // Eliminar la imagen previa
                unlink($carpeta_imagenes . '/' . $propiedad->imagen_actual . ".jpg" );
                unlink($carpeta_imagenes . '/' . $propiedad->imagen_actual . ".webp" );
                
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

            $propiedad->sincronizar($_POST);

            $alertas = $propiedad->validar();

            // Guardar Registro
            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    // Guardar las imagenes
                    $imagen_jpg->save($carpeta_imagenes . '/' . $nombre_imagen . ".jpg");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                // Guardar en la BD
                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('Location: /vendedor/propiedad');
                }
            }
        }

        $router->render('admin/vendedor/propiedades/editar', [
            'titulo' => $propiedad->titulo,
            'alertas' => $alertas,
            'propiedad' => $propiedad
        ]);
    }

    public static function eliminar_propiedad() {        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_vendedor()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $propiedad = Propiedad::find($id); // Toda la info del registro por id

            if(!isset($propiedad)) {
                header('Location: /vendedor/propiedad');
            }

            if ($propiedad->imagen) {
                $carpeta_imagenes = '../public/img/propiedades';
                unlink($carpeta_imagenes . '/' . $propiedad->imagen . ".jpg");
                unlink($carpeta_imagenes . '/' . $propiedad->imagen . ".webp");
            }

            $resultado = $propiedad->eliminar();
            

            if($resultado){
                header('Location: /vendedor/propiedad');
            }
        }
    }

    /** Clientes **/

    public static function index_cliente(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        // Numero de pagina en la URL
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /vendedor/cliente?page=1');
        }

        $por_pagina = 5;
        $total = Cliente::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $clientes = Cliente::paginar($por_pagina, $paginacion->offset());

        $id = $_SESSION['id'];
        $clientes = Cliente::belongsTo('usuarios_id', $id);
        $propiedades = Propiedad::belongsTo('usuarios_id', $id);

        $router->render('admin/vendedor/clientes/index', [
            'titulo' => 'Clientes',
            'clientes' => $clientes,
            'propiedades' => $propiedades,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear_cliente(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        $alertas = [];
        $cliente = new Cliente;

        $id = $_SESSION['id'];
        $ciudades = Ciudad::all();
        $estados = Estado::all();
        $propiedades = Propiedad::whereAND('usuarios_id', $id, 'status', 'Disponible');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_vendedor()) {
                header('Location: /login');
            }
            
            $cliente->sincronizar($_POST);
            $alertas = $cliente->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar en la BD
                $cliente->createdt = date('Y/m/d');
                $cliente->folio = date('Ymd') . str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
                $cliente->usuarios_id = $_SESSION['id'];

                $resultado = $cliente->guardar();

                if($resultado) {
                    header('Location: /vendedor/cliente');
                }
            }
        }

        $router->render('admin/vendedor/clientes/crear', [
            'titulo' => 'Crear Cliente',
            'alertas' => $alertas,
            'cliente' => $cliente,
            'propiedades' => $propiedades,
            'ciudades' => $ciudades,
            'estados' => $estados
        ]);
    }

    public static function editar_cliente(Router $router) {
        if(!is_vendedor()) {
            header('Location: /login');
        }

        $alertas = [];

        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que sea numero entero

        if(!$id) {
            header('Location: /vendedor/cliente');
        }

        // Obtener propiedad a Editar
        $cliente = Cliente::find($id);
        $ciudades = Ciudad::all();
        $estados = Estado::all();

        $id_session = $_SESSION['id'];
        $propiedades = Propiedad::belongsTo('usuarios_id', $id_session);

        if(!$cliente) {
            header('Location: /vendedor/cliente');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_vendedor()) {
                header('Location: /login');
            }

            $cliente->sincronizar($_POST);

            $alertas = $cliente->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $cliente->guardar();

                if($resultado) {
                    header('Location: /vendedor/cliente');
                }
            }
        }

        $router->render('admin/vendedor/clientes/editar', [
            'titulo' => $cliente->folio . " | " . $cliente->nombre . " " . $cliente->apellido,
            'alertas' => $alertas,
            'cliente' => $cliente,
            'propiedades' => $propiedades,
            'ciudades' => $ciudades,
            'estados' => $estados
        ]);
    }

    /** Excel **/
    
    public static function excel_propiedad(Router $router){
        if(!is_vendedor()) {
            header('Location: /login');
        }

        // $alertas = [];
        $propiedad = new Propiedad;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_vendedor()) {
                header('Location: /login');
            }

            $excel = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            $archivo = $_FILES['excel']['size'];
            // debuguear($archivo);

            if(isset($_POST['send'])) {
                // vereficar si hay un archivo
                if($archivo > 0) {
                    // Validar que sea un archivo excel
                    if($_FILES['excel']['type'] === $excel){
                        // Importar a la base de datos
                        $archivoContent = $_FILES['excel']['tmp_name'];
                        // $propiedad->importarDatos($archivoContent);
                        $propiedad->importarDatos($archivoContent);
                        
                    } else {
                        echo 'Error, no es un archivo excel';
                    }
                } else {
                    echo 'No hay archivo seleccionado';
                }
            }
        }

        $router->render('admin/vendedor/propiedades/excel', [
            // 'alertas' => $alertas
        ]);
    }
}