<?php
namespace Controllers;

use MVC\Router;

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
    
    
}