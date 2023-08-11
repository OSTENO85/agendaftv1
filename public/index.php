<?php 

require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\LoginController;
use Controllers\DashboardController;
use Controllers\MenuController;

$router = new Router();

//Login
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//crear cuenta
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

//zona de proyectos
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->post('/dashboard', [DashboardController::class, 'index']);
$router->get('/agregar-fecha', [DashboardController::class, 'agregarFecha']);
$router->post('/agregar-fecha', [DashboardController::class, 'agregarFecha']);
$router->get('/ver-misfechas', [DashboardController::class, 'ver_misfechas']);
$router->get('/ver-todasfechas', [DashboardController::class, 'ver_todasfechas']);
$router->get('/reserva', [DashboardController::class, 'reserva']);
$router->get('/perfil', [DashboardController::class, 'perfil']);
$router->get('/menu', [DashboardController::class, 'menu']);
$router->get('/modificar', [DashboardController::class, 'modificar']);
$router->post('/modificar', [DashboardController::class, 'modificar']);
//API para el menu
$router->get('/api/menu',[MenuController::class, 'index']);
$router->post('/api/menu',[MenuController::class, 'crear']);
$router->post('/api/menu/actualizar',[MenuController::class, 'actualizar']);
$router->post('/api/menu/eliminar',[MenuController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();