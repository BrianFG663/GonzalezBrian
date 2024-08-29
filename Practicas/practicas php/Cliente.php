<?php

    require 'Persona.php';


    class Cliente extends Persona{
        protected $numero_legajo;

        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo,$numero_legajo){
            parent:: __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo);
            $this->numero_legajo=$numero_legajo;
        }

        public function mostrarCliente(){
           return parent::mostrarInfo().'<div><label for="numero">Número de cliente: </label><div id="numero">' . $this->numero_legajo . '</div></div>';
        }

        public function __setSueldo($sueldo){
            $iva_sueldo = $sueldo*0.70;
            $this->sueldo = $iva_sueldo;
        }

    }

?>