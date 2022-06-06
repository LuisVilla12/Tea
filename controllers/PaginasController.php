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
        // $alertas=[];
        $idTutor=$_SESSION['id'];
        $infantes=Infante::allId($idTutor);
        $horarios=Horarios::all();
        $router->render('agenda/cita',[
            'infantes'=>$infantes,
            'horarios'=>$horarios
        ]);
    }
    // public static function inicio(Router $router){        
    //     // $idTutor=$_SESSION['id'];
    //     // $infantes=Infante::allId($idTutor);
    //     $router->render('agenda/inicio',[
    //         // 'infantes'=>$infantes            
    //     ]);
    // }
    public static function infantes(Router $router){        
        $idTutor=$_SESSION['id'];
        $infantes=Infante::allId($idTutor);
        $router->render('agenda/infantes',[
            'infantes'=>$infantes            
        ]);
    }
    
    
}