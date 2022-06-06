<?php
namespace Controllers;

use Model\Cita;

class APIController{
    public static function guardar(){
        $cita = new Cita();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $cita->sincronizar($_POST);
            $resultadoExisteCita =$cita->existeCitaEnEseDia($cita->fecha);
            // debuguear(!$resultadoExisteCita);
            // exit;
            // si no hay citas ese dia
            if(!$resultadoExisteCita){
                $resultado=$cita->guardar();
                $respuesta=[
                    'resultado'=>$resultado   
               ];
               echo json_encode($respuesta);
                // if($respuesta)
            }
            else{
                $resultadoExisteCitaHorario =$cita->existeCitaEnEseHorario($cita->fecha,$cita->id_horario);
                // debuguear($resultadoExisteCitaHorario);
                if($resultadoExisteCitaHorario){
                    $resultado=$cita->guardar();
                    $respuesta=[
                        'resultado'=>$resultado   
                   ];
                   echo json_encode($respuesta);                    
                }
            }
        }
    }
}