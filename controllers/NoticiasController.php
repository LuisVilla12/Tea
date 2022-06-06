<?php
namespace Controllers;

use MVC\Router;
use Model\Noticia;


class NoticiasController{
    public static function index(Router $router){
        // estaAutenticado();    
        $noticias= Noticia::allNoticias();
        $router->render('noticias/index', [
            'noticias'=>$noticias
        ]); 
    }
    public static function gestion(Router $router){
        // estaAutenticado();    
        $noticias= Noticia::all();
        $router->render('noticias/administrador', [
            'noticias'=>$noticias
        ]); 
    }
    public static function crear(Router $router){
        $alertas = Noticia::getAlertas();   
        $noticia= new Noticia();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {      
            $noticia = new Noticia($_POST['noticia']);
            // debuguear($noticia);                  
            $alertas=$noticia->validarErrores();            
            // debuguear($alertas);
            if(empty($alertas)){
                $resultado=$noticia->guardar();     
                if($resultado['resultado']){
                    header('Location: /noticias/administrador');
                }                           
            }            
        }
        $router->render('noticias/crear', [
            'alertas'=>$alertas,
            'noticia'=>$noticia
        ]); 
    }
    public static function actualizar(Router $router){
        $id=is_numeric($_GET['id']);
        if($id){
            $noticia= Noticia::find($_GET['id']);
        }else{
            header('Location: /noticias/administrador');
        }
        $inicio=false;        
        $alertas = Noticia::getAlertas();        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args=$_POST['noticia'];
            $noticia->sincronizar($args);   
            // Crea arreglo de errores
            $alertas = $noticia->validarErrores();
             // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $resultado=$noticia->guardar();
                if($resultado){
                    header('Location:/noticias/administrador');
                }
            }
        }
        $router->render('noticias/actualizar', [
            'alertas'=>$alertas,
            'noticia'=>$noticia
        ]); 
    }
    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $noticia= Noticia::find($_POST['id']);
            $resultado=$noticia->eliminar();
            if($resultado){
                header('Location:/noticias/administrador');
            }
            // debuguear($servicio);
        }
        // $router->render('servicios/crear', []); 
    }
}