<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\CiudadController;
use Controllers\CompromisosController;
use Controllers\DashboardController;
use Controllers\PaginasController;
use Controllers\VendedorController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

//**** Administración  ****/
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/dashboard/info', [DashboardController::class, 'info']);
$router->post('/admin/dashboard/eliminar', [DashboardController::class, 'eliminar']);

$router->get('/admin/dashboard/ciudad', [CiudadController::class, 'index']);
$router->get('/admin/dashboard/ciudad/crear', [CiudadController::class, 'crear']);
$router->post('/admin/dashboard/ciudad/crear', [CiudadController::class, 'crear']);
$router->get('/admin/dashboard/ciudad/editar', [CiudadController::class, 'editar']);
$router->post('/admin/dashboard/ciudad/editar', [CiudadController::class, 'editar']);
$router->post('/admin/dashboard/ciudad/eliminar', [CiudadController::class, 'eliminar']);

$router->get('/admin/dashboard/compromiso', [CompromisosController::class, 'index']);
$router->get('/admin/dashboard/compromiso/crear', [CompromisosController::class, 'crear']);
$router->post('/admin/dashboard/compromiso/crear', [CompromisosController::class, 'crear']);
$router->get('/admin/dashboard/compromiso/editar', [CompromisosController::class, 'editar']);
$router->post('/admin/dashboard/compromiso/editar', [CompromisosController::class, 'editar']);
$router->post('/admin/dashboard/compromiso/eliminar', [CompromisosController::class, 'eliminar']);

//**** Vendedor  ****/
$router->get('/vendedor/propiedad', [VendedorController::class, 'index']);
$router->get('/vendedor/propiedad/crear', [VendedorController::class, 'crear_propiedad']);
$router->post('/vendedor/propiedad/crear', [VendedorController::class, 'crear_propiedad']);
$router->get('/vendedor/propiedad/excel', [VendedorController::class, 'excel_propiedad']);
$router->post('/vendedor/propiedad/excel', [VendedorController::class, 'excel_propiedad']);
$router->get('/vendedor/propiedad/editar', [VendedorController::class, 'editar_propiedad']);
$router->post('/vendedor/propiedad/editar', [VendedorController::class, 'editar_propiedad']);
$router->post('/vendedor/propiedad/eliminar', [VendedorController::class, 'eliminar_propiedad']);

$router->get('/vendedor/cliente', [VendedorController::class, 'index_cliente']);
$router->get('/vendedor/cliente/crear', [VendedorController::class, 'crear_cliente']);
$router->post('/vendedor/cliente/crear', [VendedorController::class, 'crear_cliente']);
$router->get('/vendedor/cliente/editar', [VendedorController::class, 'editar_cliente']);
$router->post('/vendedor/cliente/editar', [VendedorController::class, 'editar_cliente']);

// Pagina no encontrada 404
$router->get('/404', [PaginasController::class, 'error']);
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);
$router->get('/hogares', [PaginasController::class, 'hogares']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();