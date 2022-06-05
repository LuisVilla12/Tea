<?php 
namespace Model;
class Cita extends ActiveRecord{    
    protected static $tabla = 'cita';
    protected static $columnasDB=['id','id_tutor','id_infante','id_horario','fecha','asistir','cancelo'];

    public $id;
    public $id_tutor;
    public $id_infante;
    public $id_horario;
    public $fecha;
    public $asistir;
    public $cancelo;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->id_tutor=$args['id_tutor']?? '';
        $this->id_infante=$args['id_infante']?? '';
        $this->id_horario=$args['id_horario']?? '';              
        $this->fecha=$args['fecha']?? '';              
        $this->asistir=$args['asistir']?? 0;              
        $this->cancelo=$args['cancelo']?? 0;              
    }
    // Consultar base de datos
    public  static function asistir($id) {
        $query = "UPDATE " .  static::$tabla .  " SET asistir=1  WHERE id=" .$id;    
        // debuguear($query);    
        $resultado = self::$db->query($query);  
        return $resultado;              
    }
    public static function cancelar($id) {
        $query = "UPDATE " .  static::$tabla . " SET cancelo=1  WHERE id=" . $id;        
        // debuguear($query);
        // exit;
        $resultado = self::$db->query($query);        
        return $resultado;
    }
    // Validaciones
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