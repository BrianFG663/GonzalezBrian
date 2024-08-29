<?php
    require 'Cliente.php';

    class Empleado extends Persona{

        protected $numero_empleado;

        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo,$numero_empleado){
            parent:: __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo);
            
            $this->numero_empleado=$numero_empleado;
        }

        public function mostrarEmpleado(){
           return parent::mostrarInfo().'<div><label for="numero">Número de empleado: </label><div id="numero">' . $this->numero_empleado . '</div></div>';
        }
        

        public function __setSueldo($sueldo,$numero){

            $check_iva = substr($numero,0,2);

            if($check_iva == "99"){
                $this->sueldo = $sueldo;
            }else{   
                $iva_sueldo = $sueldo*0.79;
                $this->sueldo = $iva_sueldo;
            }

        }

        
        public function verificarEdad($fecha_nacimiento){

            $fecha_nueva = new DateTime($fecha_nacimiento);
            $fecha_actual =new DateTime();

            $edad = $fecha_actual->diff($fecha_nueva)->y;

            if ($edad >= 18) {
                return true;
            } else {
                return false;
            }
        }
    }   

    

?>