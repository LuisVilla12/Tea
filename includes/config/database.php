<?php 
// Retornar una conexion
function conectarDB():mysqli{
    $db=new mysqli('localhost','tea','qazqazqaz9','bienes_raices','3306');
    if(!$db){
        echo "ERROR";
        exit;
    }
    return $db;
}
?>