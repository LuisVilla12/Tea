<?php 
namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController{
    public static function login(Router $router){
        $alertas=[];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Usuario($_POST);
            
            $errores= $auth->validarErrores();
            }
        $router->render('autenticacion/login',[
            'alertas'=>$alertas,
        ]);

    }
    public static function logout(){
        session_start();
        $_SESSION=[];
        header('Location:/');
    }
}