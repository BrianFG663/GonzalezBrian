<?php

    require_once '../Conexion.php';

    class usuario{
        public $nombre;
        public $apellido;
        private $correo;
        private $contraseña;

        public function __construct($nombre,$apellido,$correo,$contraseña){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->contraseña = $contraseña;
        }

        public function subirBaseDatos($conexion){

            $sqluser = 
            "INSERT INTO usuarios(nombre,apellido,correo,contraseña)
            VALUE(:nombre, :apellido, :correo, :contrasena)";

            $encriptacion = password_hash($this->contraseña, PASSWORD_BCRYPT);
            $resultado = $conexion->prepare($sqluser);
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':apellido', $this->apellido);
            $resultado->bindParam(':correo', $this->correo);
            $resultado->bindParam(':contrasena', $encriptacion);
            $resultado->execute();
        }

        public function verificaEmail($conexion){
            $sqlmail = 
            "SELECT correo
            FROM usuarios
            WHERE correo = :correo";

            $resultado = $conexion->prepare($sqlmail);
            $resultado->bindParam(':correo', $this->correo);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                return true; // No se encontró el correo
            } else {
                return false; // Ya existe el correo
            }

        }

    }
?>