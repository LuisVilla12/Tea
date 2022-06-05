<?php 
namespace Controllers;

use Model\AdminCita;
use Model\Cita;
use MVC\Router;

class AdminController{
    public static function index(Router $router){
        $router->render('admin/inicio',[
        ]);
    }
    public static function agenda(Router $router){
        $fecha=$_GET['fecha']??date('Y-m-d');
        // debuguear($fecha);
        $fechas =explode('-',$fecha);
        if(!checkdate($fechas[1],$fechas[2],$fechas[0])){
            header('Location:/404');
        }
        // Consultar base de datos
        $consulta = " SELECT c.id,CONCAT(i.nombre,' ',i.apellidoPat,' ',i.apellidoMat) AS nombreInfante,CONCAT(t.nombre,' ',t.apellidoPat,' ',t.apellidoMat) AS nombreTutor,i.fechaNacimiento,i.sexo, h.horaInicio FROM cita AS c ";
        $consulta .= " INNER JOIN usuarios as t ON c.id_tutor = t.id";
        $consulta .= " INNER JOIN infante as i ON c.id_infante=i.id";
        $consulta .= " INNER JOIN horarios as h ON h.id=c.id_horario ";        
        // $consulta .= " LEFT OUTER JOIN servicios  ON servicios.id=citas_servicios.idServicio ";        
        $consulta .= " WHERE fecha = '${fecha}' and c.asistir=0 and c.cancelo=0 order by h.horaInicio ASC";

        // debuguear($consulta);
        // exit;
        $resultadoCitas=AdminCita::SQL($consulta);

        $router->render('/admin/agenda',[
            'citas'=>$resultadoCitas,
            'fecha'=>$fecha
        ]);
    }
    public static function eliminar(){        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id=$_POST['id'];
            $cita= Cita::find($id);
            $resultado=$cita->cancelar($id);
            // debuguear($resultado);
            $respuesta=[
                'resultado'=>$resultado   
            ];
            echo json_encode($respuesta);
            // if($resultado){
            //     header('Location:' . $_SERVER['HTTP_REFERER']);
            // }
        }
    }
    public static function asistio(){        
        $id=$_GET['id'] ?? '';        
        // debuguear($id);
        $cita= Cita::find($id);
        $resultado=$cita->asistir($id);
        $respuesta=[
            'resultado'=>$resultado   
        ];
        echo json_encode($respuesta);
        // if($resultado){
        //     header('Location:' . $_SERVER['HTTP_REFERER']);
        // }
    }

}
