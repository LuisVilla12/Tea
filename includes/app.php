<?php 
require __DIR__ . '/../vendor/autoload.php';
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__ . '../config');
$dotenv->safeLoad();
require 'funciones.php';
require 'config/database.php';
// Uso del namespace
use Model\ActiveRecord;
// Conexion a la base de datos
$db=conectarDB();
// Como es estatico no necesita instancearse
ActiveRecord::setDB($db);

?>