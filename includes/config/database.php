<?php 
// Retornar una conexion
function conectarDB():mysqli{
    $db=new mysqli($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_BD'],$_ENV['DB_PORT']);
    // debuguear($_ENV);
    if(!$db){
        echo "ERROR";
        exit;
    }
    return $db;
}
?>