<?php

    require 'Persona.php';


    class Cliente extends Persona{

        protected $numero_cuenta;

        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$contraseña,$sueldo,$numero_cuenta){
            parent:: __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$contraseña,$sueldo);
            $this->numero_cuenta=$numero_cuenta;
        }

        public function mostrarCliente(){
           return parent::mostrarInfo().'<div><label for="numero">Número de cliente: </label><div id="numero">' . $this->numero_cuenta . '</div></div>';
        }

        public function __setSueldo($sueldo){
            $iva_sueldo = $sueldo*0.70;
            $this->sueldo = $iva_sueldo;
        }

        public function subirBaseDatos($conexion){
            $sqlregistro = 
            "INSERT INTO personas(nombre, apellido, fecha_nacimiento, dni, localidad, provincia, telefono, email, contraseña, sueldo, numero_cuenta, checkeo)
            VALUES (:nombre, :apellido, :fecha_nacimiento, :dni, :localidad, :provincia, :telefono, :email, :contrasena, :sueldo, :numero_cuenta, :checkeo)";
        
            $resultado = $conexion->prepare($sqlregistro);
            $checkeo = 'c';
        
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
            $resultado->bindParam(':legajo', $this->numero_cuenta);
            $resultado->bindParam(':checkeo', $checkeo);
        
            try {
                $resultado->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }



    }


?>