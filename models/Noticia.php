<?php 
namespace Model;
class Noticia extends ActiveRecord{    
    protected static $tabla = 'noticias';
    protected static $columnasDB=['id','titulo','autor','fecha','descripcion','urlImagen','url','fuente'];

    public $id;
    public $titulo;
    public $autor;
    public $fecha;
    public $descripcion;
    public $urlImagen;
    public $url;
    public $fuente;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->titulo=$args['titulo']?? '';
        $this->autor=$args['autor']?? '';        
        $this->fecha=$args['fecha']?? '';        
        $this->descripcion=$args['descripcion']?? '';        
        $this->urlImagen=$args['urlImagen']?? 'imagen.jpg';        
        $this->url=$args['url']?? '';              
        $this->fuente=$args['fuente']?? '';              
    }
    // Validar
    public function validarErrores(){
        if(!$this->titulo){
            self::$alertas['error'][]='Debe ingresar un título';
        }
        if(!$this->fuente){
            self::$alertas['error'][]='Debe ingresar la fuente';
        }
        if(!$this->autor){
            self::$alertas['error'][]='Debe ingresar un autor';
        }
        if(!$this->fecha){
            self::$alertas['error'][]='Debe ingresar una fecha';
        }
        if(!$this->url){
            self::$alertas['error'][]='Debe ingresar la url';
        }
        if(!$this->urlImagen){
            self::$alertas['error'][]='Debe ingresar una imagen';
        }        
        if(!$this->descripcion){
            self::$alertas['error'][]='Debe ingresar una breve descripcion';
        }
       
        return self::$alertas;
    }
    public static function allNoticias(){
        $query="SELECT * FROM " . self::$tabla . " ORDER BY fecha DESC";
        // debuguear($query);
        // exit;
        // $resultado = self::$db->query($query);
        $resultado = self::consultarSQL($query);
        // debuguear($resultado);
        // exit;
        return $resultado;
    } 
    public static function allLimit($limite){
        $query="SELECT * FROM " . self::$tabla . " ORDER BY fecha DESC LIMIT " . $limite ;
        $resultado = self::consultarSQL($query);
        // debuguear($resultado);
        // exit;
        return $resultado;
    } 
}
?>  
