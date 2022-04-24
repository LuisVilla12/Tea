<?php
namespace Model;
class Usuario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='usuarios';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','nombre','apellidoPat','apellidoMat','fechaNacimiento','sexo','correo','telefono','contraseña','tipo','token','confirmado'];

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
        $this->tipo=$args['tipo']?? '';        
        $this->token=$args['token']?? '';        
        $this->confirmado=$args['confirmado']?? 0;        
    }
    public function validarErrores(){        
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar su nombre';
        }
        if (!$this->apellidoPat) {
            self::$errores[] = 'Debe ingresar su apellido Paterno';
        }
        if (!$this->apellidoMat) {
            self::$errores[] = 'Debe ingresar su apellido Materno';
        }
        if (!$this->fechaNacimiento) {
            self::$errores[] = 'Debes seleccionar tu fecha de nacimiento';
        }
        if (!$this->sexo) {
            self::$errores[] = 'Debes seleccionar tu sexo';
        }
        if (!$this->telefono) {
            self::$errores[] = 'Debe ingresar un n° de telefono';
        }
        if (!$this->correo) {
            self::$errores[] = 'Debe ingresar un correo electronico';
        }
        if (!$this->contraseña) {
            self::$errores[] = 'Debe ingresar una contraseña';
        }        
        return self::$errores;
    }    
    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows) {
            self::$errores[] = 'El Usuario No Existe';
            return;
        }
        return $resultado;
    }
    public function validaCoreoRegistrado(){
        $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$errores[]='El correo ya ha sido registrado';
        }
        return $resultado;
    }

    public function comprobarPassword($contraseña){
        $verifica= password_verify($contraseña,$this->contraseña);
        if(!$verifica){
            self::$errores[]='La contraseña es incorrecta';
        }else{
            return true;
        }
    }
    public function extraerNombre() {
        // Revisar si el usuario existe.
        $query = "SELECT nombre FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        $usuario = $resultado->fetch_object();
        return $usuario;
    }
    public function generarToken(){
        // Genera un id unico
        $this->token=uniqid();
    }

    public function cuentaConfirmada(){
        if($this ->confirmado === '0'){
            self::$errores[]='Usuario no esta autenticado';
        }else{
            return true;
        }
    }
    public static function allEmpleados(){
        // Query
        $query = "SELECT * FROM " .  static::$tabla . " WHERE idTipoUsuario = 2";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    public static function allClientes(){
        // Query
        $query = "SELECT * FROM " .  static::$tabla . " WHERE idTipoUsuario = 1";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
}
?>  