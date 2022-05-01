<?php 
namespace Model;
class Usuario extends ActiveRecord{    
    protected static $tabla = 'usuarios';
    protected static $columnasDB=['id','nombre','apellidoPat','apellidoMat','fechaNacimiento','sexo','correo','telefono','contraseña','tipo','token','confirmado'];

    public $id;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $fechaNacimiento;
    public $sexo;
    public $correo;
    public $telefono;
    public $contraseña;
    public $tipo;
    public $token;
    public $confirmado;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->apellidoPat=$args['apellidoPat']?? '';        
        $this->apellidoMat=$args['apellidoMat']?? '';        
        $this->fechaNacimiento=$args['fechaNacimiento']?? '';        
        $this->sexo=$args['sexo']?? '';        
        $this->correo=$args['correo']?? '';
        $this->telefono=$args['telefono']?? '';
        $this->contraseña=$args['contraseña']?? '';        
        $this->tipo=$args['tipo']?? 0;        
        $this->token=$args['token']?? '';        
        $this->confirmado=$args['confirmado']?? 0;        
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
        if(!$this->telefono){
            self::$alertas['error'][]='Ingrese su telefono';
        }
        if(!$this->correo){
            self::$alertas['error'][]='Ingrese su correo';
        }
        if($this->sexo===''){
            self::$alertas['error'][]='Seleccione un sexo';
        }
        if(!$this->contraseña){
            self::$alertas['error'][]='Ingrese su contraseña';
        }
        if(!$this->fechaNacimiento){
            self::$alertas['error'][]='Seleccione su fecha de nacimiento';
        }
        if(strlen($this->contraseña)<8){
            self::$alertas['error'][]='La contraseña debe contar con almenos 9 caracteres';
        }
        return self::$alertas;
    }
      // Revisa si usuario existe
    public function existeUsuario(){
        $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][]='El correo ya ha sido registrado';
        }
        return $resultado;
    }
    public function hashContraseña(){
        $this->contraseña=password_hash($this->contraseña,PASSWORD_BCRYPT);
    }
    public function comprobarPassword($contraseña){
        $verifica= password_verify($contraseña,$this->contraseña);
        if(!$verifica){
            self::$alertas['error'][]='La contraseña es incorrecta';
        }else{
            return true;
        }
    }
    public function generarToken(){
        // Genera un id unico
        $this->token=uniqid();
    }
    public function validarLogin(){
        if(!$this->correo){
            self::$alertas['error'][]='Debe ingresar un correo electronico';
        }
        if(!$this->contraseña){
            self::$alertas['error'][]='Debe ingresar una contraseña';
        }
        // if(strlen($this->contraseña)<8){
        //     self::$alertas['error'][]='La contraseña debe contar con almenos 9 caracteres';
        // }
        return self::$alertas;
    }
    public function validarCorreo(){
        if(!$this->correo){
            self::$alertas['error'][]='Debe ingresar un correo electronico';
        }
        return self::$alertas;
    }
}
?>  