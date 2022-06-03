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
        $this->urlImagen=$args['urlImagen']?? '';        
        $this->url=$args['url']?? '';              
        $this->fuente=$args['fuente']?? '';              
    }
    // Validar
    public function validarErrores(){
        if(!$this->titulo){
            self::$alertas['error'][]='Debe ingresar un titulo';
        }
        if(!$this->autor){
            self::$alertas['error'][]='Debe ingresar un autor';
        }
        if(!$this->fecha){
            self::$alertas['error'][]='Debe ingresar una fecha';
        }
        if($this->fuente){
            self::$alertas['error'][]='Debe ingresar la fuente';
        }
        if($this->urlImagen){
            self::$alertas['error'][]='Debe ingresar una imagen';
        }        
        if(!$this->descripcion){
            self::$alertas['error'][]='Debe ingresar una breve descripcion';
        }
        if($this->url){
            self::$alertas['error'][]='Debe ingresar la url';
        }
        return self::$alertas;
    }
}
?>  
