<?php
namespace Controllers;

use MVC\Router;
use Model\Infante;
use Model\Horarios;
use Model\Cita;

class PaginasController {
    public static function index(Router $router){
        $router->render('pages/index',[]);
    }
    public static function MDAPC(Router $router){
        $router->render('pages/materialDeApoyo',[]);
    }    
    public static function MDAMV(Router $router){
        $router->render('pages/materialDeApoyoMV',[]);
    }
    public static function MDAMVI(Router $router){
        $router->render('pages/materialDeApoyoInfante',[]);
    }
    public static function MDAMVT(Router $router){
        $router->render('pages/materialDeApoyoTutor',[]);
    }
    public static function conocenos(Router $router){
        $router->render('pages/conocenos',[]);
    }
    public static function sabias(Router $router){
        $router->render('pages/sabias',[]);
    }
    public static function noticias(Router $router){
        $router->render('pages/noticias',[]);
    }
    public static function cita(Router $router){
        $alertas=[];
        $cita = new Cita();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $cita->sincronizar($_POST);
            // validar si hay citas ese dia
            $resultadoExisteCita =$cita->existeCitaEnEseDia($cita->fecha);
            // si no hay citas ese dia
            if(!$resultadoExisteCita){
                $resultado=$cita->guardar();                    
                if($resultado){
                    header('Location: /inicio');
                }
            }
            else{
                debuguear('Hay citas en esa fecha');
                $resultadoExisteCitaHorario =$cita->existeCitaEnEseHorario($cita->fecha,$cita->id_horario);
                // si no hay citas ese horario
                if(!$resultadoExisteCitaHorario){
                    $resultado=$cita->guardar();                    
                    if($resultado){
                        header('Location: /inicio');
                    }
                }
                else{
                    debuguear('Hay citas en ese horario');
                }
            }
        }
        // $horariosOcupados=$cita->horariosNoDisponibles($cita->fecha,$cita->id_horario);
        // $alertas=Infante::getAlertas();
        $idTutor=$_SESSION['id'];
        $infantes=Infante::allId($idTutor);
        $horarios=Horarios::all();
        $router->render('agenda/cita',[
            'infantes'=>$infantes,
            'horarios'=>$horarios
        ]);
    }
    public static function inicio(Router $router){        
        $idTutor=$_SESSION['id'];
        $infantes=Infante::allId($idTutor);
        $router->render('agenda/inicio',[
            'infantes'=>$infantes            
        ]);
    }
    
    
}