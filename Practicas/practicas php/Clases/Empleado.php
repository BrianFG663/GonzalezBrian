<?php

    require_once 'Persona.php';
    require_once '../conexion.php';

    class Empleado extends Persona{

        public $legajo;

        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$contrasena,$sueldo,$legajo){
            parent:: __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$contrasena,$sueldo);
            
            $this->legajo=intval($legajo);
        }

        public function mostrarEmpleado(){
           return parent::mostrarInfo().'<div class="contenedor-numero"><label for="numero">Número de empleado: </label><div id="numero">' . $this->legajo . '</div><input type="submit" name="retirar" id="retirar" value="Mis transacciones" onclick="transacciones()"></div>';
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

        
        public function subirBaseDatos($conexion){
            $sqlregistro = 
            "INSERT INTO personas(nombre, apellido, fecha_nacimiento, dni, localidad, provincia, telefono, email, contraseña, sueldo, legajo, checkeo)
            VALUES (:nombre, :apellido, :fecha_nacimiento, :dni, :localidad, :provincia, :telefono, :email, :contrasena, :sueldo, :legajo, :checkeo)";
        
            $resultado = $conexion->prepare($sqlregistro);
            $checkeo = 'e';
        
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':apellido', $this->apellido);
            $resultado->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
            $resultado->bindParam(':dni', $this->dni);
            $resultado->bindParam(':localidad', $this->localidad);
            $resultado->bindParam(':provincia', $this->provincia);
            $resultado->bindParam(':telefono', $this->telefono);
            $resultado->bindParam(':email', $this->mail);
            $resultado->bindParam(':contrasena', $this->contrasena);
            $resultado->bindParam(':sueldo', $this->sueldo);
            $resultado->bindParam(':legajo', $this->legajo);
            $resultado->bindParam(':checkeo', $checkeo);
        
            try {
                $resultado->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        
    }   
    

?>