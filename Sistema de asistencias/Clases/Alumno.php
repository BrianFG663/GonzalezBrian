<?php

    include_once(__DIR__ . '/../Resources/Traits/Funciones.php');
    

    class Alumno{
        use Funciones;
        
        public $nombre;
        public $apellido;
        protected $dni;
        protected $mail;
        protected $fecha_nacimiento;

        public function __construct($nombre,$apellido,$dni,$mail,$fecha_nacimiento){

            $this->nombre =  $this->uperCase($nombre);
            $this->apellido = $this->uperCase($apellido);
            $this->dni = $dni;
            $this->mail = $mail;
            $this->fecha_nacimiento = $fecha_nacimiento;
        }
    }

?>