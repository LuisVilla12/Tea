<?php 
namespace Model;
class Cita extends ActiveRecord{    
    protected static $tabla = 'cita';
    protected static $columnasDB=['id','id_tutor','id_infante','id_horario','fecha'];

    public $id;
    public $id_tutor;
    public $id_infante;
    public $id_horario;
    public $fecha;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->id_tutor=$args['id_tutor']?? '';
        $this->id_infante=$args['id_infante']?? '';
        $this->id_horario=$args['id_horario']?? '';              
        $this->fecha=$args['fecha']?? '';              
    }
    
    public function existeCitaEnEseDia($fecha){
        $query="SELECT * FROM " . self::$tabla . " WHERE fecha = '" . $fecha ."'";
        // debuguear($query);
        // exit;
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            return true;
        }else{
            return false;
        }
    }    
    public function existeCitaEnEseHorario($fecha,$horario){
        // $query="SELECT * FROM " . $horarios . " WHERE fecha = '" . $fecha ."'";
        $query= "SELECT * FROM  cita as c inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        // debuguear($query);
        // exit;
        $resultado = self::$db->query($query);
        // debuguear($resultado);
        // exit;
        if($resultado->num_rows){
            return true;
        }else{
            return false;
        }
    }    
    public static function horariosNoDisponibles($fecha,$horario) {
        $query= "SELECT id,horaInicio,horaFin FROM  cita as c inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        // $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        debuguear($resultado);
        exit;
        return $resultado;
        
    }
}    
?>  