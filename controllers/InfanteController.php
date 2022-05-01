<?php
namespace Controllers;

use MVC\Router;
use Model\Infante;

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
}