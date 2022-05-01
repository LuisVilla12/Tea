<?php 
// Retornar una conexion
function conectarDB():mysqli{
    $db=new mysqli('localhost','root','qazqazqaz9','tea','3306');
    if(!$db){
        echo "ERROR";
        exit;
    }
    return $db;
}
?>