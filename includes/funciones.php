<?php 
// __DIR__ coloca como ubicacion actual
define('TEMPLATES__URL',__DIR__ . '/templates');
define('FUNCIONES__URL',__DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $imagen=false){
    include TEMPLATES__URL . "/${nombre}.php";
}

function validarInicioSesion ()  {
    session_start();
    // ver valores de la superglobal login
    if(!$_SESSION['login']){
        header('Location:/');
    }
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}
// Sanitizar
function sanitizar($string):string{
$sanitizar=htmlspecialchars($string);
return $sanitizar;
}

function validarTipoDeContenido($tipo){
    $tipos=['vendedor','propiedad'];
    // Retorna si hay un elemento en el arreglo
    return in_array($tipo,$tipos) ;
}
function MostrarMensaje($codigo){
    $mensaje='';
    switch ($codigo){
        case 1:
            $mensaje='Creado correctamente';
            break;  
        case 2:
            $mensaje='Actualizado correctamente';
            break;
        case 3:
            $mensaje='Eliminado correctamente';
            break;    
        case 4:
            $mensaje='Bienvenido';
            break;            
        default:
            $mensaje=false;
            break;            
    }
    return $mensaje;
}
function validarORediredireccionar($url){
    // Obtener el valor del id del metodo GET
    $id = $_GET['id'] ?? null;
    // Validar que sea un entero
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: ${url}');
    }
    return $id;
}