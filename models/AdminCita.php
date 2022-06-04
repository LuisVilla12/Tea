<?php
namespace Model;
class AdminCita extends ActiveRecord{
    protected static $tabla ='citas';
    protected static $columnasDB =['id','nombreInfante','nombreTutor','fechaNacimiento','sexo','horaInicio'];
    public $id;
    public $nombreInfante;
    public $nombreTutor;
    public $fechaNacimiento;
    public $sexo;
    public $horaInicio;
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->nombreInfante=$args['nombreInfante']??'';
        $this->nombreTutor=$args['nombreTutor']??'';
        $this->fechaNacimiento=$args['fechaNacimiento']??'';
        $this->sexo=$args['sexo']??'';
        $this->horaInicio=$args['horaInicio']??'';        
    }
}
?>  