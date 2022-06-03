<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;

use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\InfanteController;
use Controllers\NoticiasController;
$router = new Router();
// Iniciar sesión
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);

// Crear cuenta
$router->get('/crear-cuenta',[LoginController::class,'crear_cuenta']);
$router->post('/crear-cuenta',[LoginController::class,'crear_cuenta']);
$router->get('/logout',[LoginController::class,'logout']);

// Infantes
$router->get('/inicio',[PaginasController::class,'inicio']);
$router->get('/registrar-infante',[InfanteController::class,'registrar_infante']);
$router->post('/registrar-infante',[InfanteController::class,'registrar_infante']);

// Noticia
$router->get('/noticias',[NoticiasController::class,'index']);
// Publica
$router->get('/',[PaginasController::class,'index']);
$router->get('/materia-de-apoyo',[PaginasController::class,'MDAPC']);
$router->get('/materia-de-apoyo-mv',[PaginasController::class,'MDAMV']);
$router->get('/materia-de-apoyo-infante',[PaginasController::class,'MDAMVI']);
$router->get('/materia-de-apoyo-tutor',[PaginasController::class,'MDAMVT']);
$router->get('/conocenos',[PaginasController::class,'conocenos']);
$router->get('/sabias',[PaginasController::class,'sabias']);
// $router->get('/noticias',[PaginasController::class,'noticias']);
// cita
$router->get('/cita',[PaginasController::class,'cita']);
$router->post('/cita',[PaginasController::class,'cita']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();