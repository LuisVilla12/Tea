<?php
namespace Controllers;

use MVC\Router;
use Model\Infante;
use Model\InfanteTemp;

class InfanteController{
    public static function registrar_infante(Router $router){
        $alertas=[];
        $infante = new Infante();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $infante->sincronizar($_POST);
            $alertas=$infante->validarErrores();
            if(empty($alertas)){
                $resultado=$infante->guardar();                    
                if($resultado){
                    header('Location: /inicio');
                }
            }
        }
        $alertas=Infante::getAlertas();
        $router->render('infante/crear',[
            'alertas'=>$alertas,
            'infante'=>$infante
        ]);
    }   
    public static function gestion(Router $router){
        // estaAutenticado();    
        $infantes= InfanteTemp::allIfantes();
        $router->render('infante/administrador', [
            'infantes'=>$infantes
        ]); 
    }   
    public static function actualizar(Router $router){
        $id=is_numeric($_GET['id']);
        if($id){
            $infante= Infante::find($_GET['id']);
        }else{
            header('Location: /noticias/administrador');
        }       
        $alertas = Infante::getAlertas();        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $args=$_POST['infante'];
            $infante->sincronizar($args);
            // debuguear($infante);  
            // exit; 
            // Crea arreglo de errores
            $alertas = $infante->validarErrores();
            // debuguear($alertas);
            // exit;
             // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $resultado=$infante->guardar();
                // debuguear($resultado);
                // exit;
                if($resultado){
                    header('Location:/infantes/administrador');
                }
            }
        }
        $router->render('infante/actualizar', [
            'alertas'=>$alertas,
            'infante'=>$infante
        ]); 
    }
    public static function eliminar(){        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id=$_POST['id'];
            $infante= Infante::find($id);
            $resultado=$infante->cancelar($id);
            $respuesta=[
                 'resultado'=>$resultado   
            ];
            echo json_encode($respuesta);
            // if($resultado){
            //     header('Location: /infantes/administrador' );
            // }
        }

    }
}