<?php 

namespace Controllers;

use Classes\Paginacion;
use Model\Propiedad;
use MVC\Router;
use Model\Usuario;

class DashboardController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        // Numero de pagina en la URL
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/dashboard?page=1');
        }

        $por_pagina = 5;
        $total = Usuario::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/dashboard?page=1');
        }

        $vendedores = Usuario::paginar($por_pagina, $paginacion->offset());

        $vendedores = Usuario::whereAll('vendedor', 1);
        
        $router->render('admin/dashboard/index', [
            'titulo' => 'Administración',
            'vendedores' => $vendedores,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function info(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $vendedores = Usuario::where('id', $id);
        $propiedades = Propiedad::belongsTo('usuarios_id', $id);

        if(!$id) {
            header('Location: /admin/dashboard');
        }

        $router->render('admin/dashboard/info', [
            'titulo' => $vendedores->nombre . " " . $vendedores->apellido,
            'propiedades' => $propiedades
        ]);
    }

    public static function eliminar() {        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $vendedor = Usuario::find($id); // Toda la info del registro por id

            if(!isset($vendedor)) {
                header('Location: /admin/ponentes');
            }

            $resultado = $vendedor->eliminar();

            if($resultado){
                header('Location: /admin/dashboard');
            }
        }
    }
}