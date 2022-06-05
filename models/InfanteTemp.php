<?php 
namespace Model;
class InfanteTemp extends ActiveRecord{    
    protected static $tabla = 'infante';
    protected static $columnasDB=['id','nombre','fechaNacimiento','sexo','nombreTutor'];

    public $id;
    public $nombre;
    public $fechaNacimiento;
    public $sexo;
    public $nombreTutor;
    public $idUsuario;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';        
        $this->fechaNacimiento=$args['fechaNacimiento']?? '';        
        $this->sexo=$args['sexo']?? '';        
        $this->nombreTutor=$args['nombreTutor']?? '';                
        $this->idUsuario=$args['idUsuario']?? '';                
    }
    public static function allIfantes() {        
        $query="SELECT i.id, CONCAT (i.nombre,' ', i.apellidoPat,' ',i.apellidoMat ) AS nombre,i.fechaNacimiento,i.sexo,CONCAT (s.nombre,' ',s.apellidoPat,' ',s.apellidoMat) AS nombreTutor,i.idUsuario FROM infante AS i 
        INNER JOIN usuarios AS s ON s.id=i.idUsuario WHERE i.estatus=1;";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

      // Revisa si usuario existe
    // public function existeUsuario(){
    //     $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->nombre . "' LIMIT 1";
    //     $resultado = self::$db->query($query);
    //     if($resultado->num_rows){
    //         self::$alertas['error'][]='El infante ya ha sido registrado';
    //     }
    //     return $resultado;
    // }    
}
?>  
