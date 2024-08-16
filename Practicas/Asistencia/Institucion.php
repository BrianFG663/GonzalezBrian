<?php

    class Institucio{
        public $nombre;
        public $telefono;
        public $direccion;
        public $correo_electronico;

        public function __construct($nombre,$telefono,$direcion,$correo_electronico){
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->correo_electronico = $correo_electronico;
        }
    }
?>