<?php 
namespace Model;
class Infante extends ActiveRecord{    
    protected static $tabla = 'infante';
    protected static $columnasDB=['id','nombre','apellidoPat','apellidoMat','fechaNacimiento','sexo','idUsuario','altura','peso','estudia'];

    public $id;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $fechaNacimiento;
    public $sexo;
    public $idUsuario;
    public $altura;
    public $peso;
    public $estudia;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->apellidoPat=$args['apellidoPat']?? '';        
        $this->apellidoMat=$args['apellidoMat']?? '';        
        $this->fechaNacimiento=$args['fechaNacimiento']?? '';        
        $this->sexo=$args['sexo']?? '';        
        $this->idUsuario=$args['idUsuario']?? 1;        
        $this->altura=$args['altura']?? '';        
        $this->peso=$args['peso']?? '';        
        $this->estudia=$args['estudia']?? '';        
    }
    // Validar
    public function validarErrores(){
        if(!$this->nombre){
            self::$alertas['error'][]='Ingrese su nombre';
        }
        if(!$this->apellidoPat){
            self::$alertas['error'][]='Ingrese su apellido Paterno';
        }
        if(!$this->apellidoMat){
            self::$alertas['error'][]='Ingrese su apellido Materno';
        }
        if($this->sexo===''){
            self::$alertas['error'][]='Seleccione un sexo';
        }        
        if(!$this->fechaNacimiento){
            self::$alertas['error'][]='Seleccione su fecha de nacimiento';
        }
        if(!$this->altura){
            self::$alertas['error'][]='Ingrese su altura promedio';
        }
        if(!$this->peso){
            self::$alertas['error'][]='Ingrese su peso';
        }
        if(!$this->estudia){
            self::$alertas['error'][]='Seleccione si estudia ';
        }
        return self::$alertas;
    }
      // Revisa si usuario existe
    public function existeUsuario(){
        $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][]='El infante ya ha sido registrado';
        }
        return $resultado;
    }    
}
?>  
