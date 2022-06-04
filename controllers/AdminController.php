<?php 
namespace Controllers;

use Model\AdminCita;
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
        $consulta .= " WHERE fecha = '${fecha}' and citas.asistio=0 and citas.cancelo=0 order by horarios.horaInicio ASC";
        
        $resultadoCitas=AdminCita::SQL($consulta);
        
        // debuguear($resultadoCitas);
        $inicio=false;
        $router->render('/admin/agenda',[
            'citas'=>$resultadoCitas,
            'fecha'=>$fecha
        ]);
    }
    

}
