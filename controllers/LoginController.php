<?php 
namespace Controllers;

use MVC\Router;
use Model\Usuario;
class LoginController{
    public static function login(Router $router){
        $alertas=[];
        $auth= new Usuario;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Usuario($_POST);
            $alertas=$auth->validarLogin();
            if(empty($alertas)){
                $usuarioEncontrado=$auth->findWhere('correo',$auth->correo);
                if($usuarioEncontrado){
                    // verifica la contraseña
                    $resultado_verificacion=$usuarioEncontrado->comprobarPassword($auth->contraseña);
                    if($resultado_verificacion){
                        if(!isset($_SESSION)) {
                            session_start();
                        };                            
                        $_SESSION['id']=$usuarioEncontrado->id;
                        $_SESSION['nombre']=$usuarioEncontrado->nombre . " ".$usuarioEncontrado->apellidoPat;
                        $_SESSION['correo']=$usuarioEncontrado->correo;
                        $_SESSION['tipo']=$usuarioEncontrado->tipo;
                        $_SESSION['logueado']=true;
                        // redireccionar
                        if($usuarioEncontrado->tipo==="0"){
                            header('Location: /inicio');                            
                        }
                        else{                                
                            header('Location: /admin');
                        }   
                    }
                }else{
                    Usuario::setAlerta('error','Correo no registrado');
                }
            }
        }
        $alertas=Usuario::getAlertas();
        $router->render('autenticacion/login',[
            'alertas'=>$alertas,
            'usuario'=>$auth

        ]);
    }
    public static function crear_cuenta(Router $router){
        $alertas=[];
        $usuario = new Usuario();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $contraseña=$_POST['contraseña'];
            $confirmar_contraseña=$_POST['confirmar_contraseña'];
            $usuario->sincronizar($_POST);
            // debuguear($usuario);
            $alertas=$usuario->validarErrores();
            if(empty($alertas)){
                if($confirmar_contraseña!=""){                
                    if(($contraseña===$confirmar_contraseña)){
                        // verificar que cuenta no este registrada
                        $resultado=$usuario->existeUsuario();     
                        if($resultado->num_rows){
                            $alertas=Usuario::getAlertas();
                        }else{
                            // Hashear contraseña
                            $usuario->hashContraseña();
                            // Generar token
                            $usuario->generarToken();                 
                            $resultado=$usuario->guardar();                    
                            if($resultado){
                                header('Location: /login');
                            }
                        }                    
                    }else{
                        Usuario::setAlerta('error','Contraseñas no coinciden');
                    }
                    }else{
                Usuario::setAlerta('error','Debes confirmar contraseña');
                    }            
                }
        }
        $alertas=Usuario::getAlertas();
        // debuguear($alertas);
        $router->render('autenticacion/crear-cuenta',[
            'alertas'=>$alertas,
            'usuario'=>$usuario
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION=[];
        header('Location:/');
    }
}