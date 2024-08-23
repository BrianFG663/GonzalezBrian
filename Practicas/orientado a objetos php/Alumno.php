<?php

    require 'Persona.php';

    class Alumno extends Persona{
        public $materia;

        public function __construct($nombre,$apellido,$dni,$materia){
            parent::__construct($nombre,$apellido,$dni);
            $this->materia = $materia;
        }

        public function mostrarMaterias(){
            return parent::mostrarInfo().", mi materias es ".$this->materia;
        }
    }
?>