<?php

class Profesor {
    public $nombre;
    public $apellido;
    public $correo_electronico;
    public $telefono;
    public $departamento;



    public function __construct($nombre,$apellido,$materia){

        $this->nombre = $nombre;
        $this->apellido =$apellido;
        $this->correo_electronico =$correo_electronico;
        $this->telefono = $telefono;
        $this->departamento =$departamento;
    }
}


   /* public function saludar(){
        return "hola soy ".$this->nombre;
    }

    public function especialidad(){
        return "hola soy ".$this->nombre." Mi especialidad es ".$this->materia;
    }

    public function cambiarMateri($materia2){
        $this->materia = $materia2;

        return "la nueva materia es ".$this->materia;
    }/*/
?>