<?php 

namespace Controllers;

use Classes\Paginacion;
use Model\Ciudad;
use Model\Estado;
use MVC\Router;

class CiudadController {
    public static function index(Router $router){
        if(!is_admin()) {
            header('Location: /login');
        }

        // Numero de pagina en la URL
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/dashboard/ciudad?page=1');
        }

        $por_pagina = 5;
        $total = Ciudad::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/dashboard/ciudad?page=1');
        }

        $ciudades = Ciudad::paginar($por_pagina, $paginacion->offset());
        
        $router->render('admin/dashboard/territorio/index', [
            'titulo' => 'Ciudades',
            'ciudades' => $ciudades,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $ciudad = new Ciudad;
        $estados = Estado::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }

            $ciudad->sincronizar($_POST);
            $alertas = $ciudad->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $ciudad->guardar();

                if($resultado) {
                    header('Location: /admin/dashboard/ciudad');
                }
            }
        }

        $router->render('admin/dashboard/territorio/crear', [
            'titulo' => 'Crear Ciudad',
            'alertas' => $alertas,
            'ciudad' => $ciudad,
            'estados' => $estados,
        ]);
    }

    public static function editar(Router $router){
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); 

        if(!$id) {
            header('Location: /admin/dashboard/ciudad');
        }

        $ciudad = Ciudad::find($id);        
        $estados = Estado::all();
        if(!$ciudad) {
            header('Location: /admin/dashboard/ciudad');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()) {
                header('Location: /login');
            }

            $ciudad->sincronizar($_POST);
            $alertas = $ciudad->validar();

            // Guardar Registro
            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $ciudad->guardar();

                if($resultado) {
                    header('Location: /admin/dashboard/ciudad');
                }
            }
        }

        $router->render('admin/dashboard/territorio/editar', [
            'titulo' => $ciudad->ciudad,
            'alertas' => $alertas,
            'ciudad' => $ciudad,
            'estados' => $estados,
        ]);
    }

    public static function eliminar() {        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $ciudad = Ciudad::find($id); // Toda la info del registro por id

            if(!isset($propiedad)) {
                header('Location: /admin/dashboard/ciudad');
            }

            $resultado = $ciudad->eliminar();
            
            if($resultado){
                header('Location: /admin/dashboard/ciudad');
            }
        }
    }
}