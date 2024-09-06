<?php

    require 'Traits/Funciones.php';

    class Persona{
        use Funciones;


        public $nombre;
        public $apellido;
        public $fecha_nacimiento;
        public $dni;
        public $localidad;
        public $provincia;
        public $telefono;
        public $mail;
        protected $sueldo;

        
    
        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo){

            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->fecha_nacimiento=$fecha_nacimiento;
            $this->dni=$dni;
            $this->localidad=$localidad;
            $this->provincia=$provincia;
            $this->telefono=$telefono;
            $this->mail=$mail;
            $this->sueldo=$sueldo;
        }

        public function mostrarInfo(){
            return '<div><label for="nombre">Nombre: </label><div id="nombre">' . $this->mayuscula($this->nombre) . '</div></div>
                    <div><label for="apellido">Apellido: </label><div id="apellido">' . $this->apellido . '</div></div>
                    <div><label for="fecha_nacimiento">Fecha de Nacimiento: </label><div id="fecha_nacimiento">' . $this->fecha_nacimiento . '</div></div>
                    <div><label for="dni">DNI: </label><div id="dni">' . $this->dni . '</div></div>
                    <div><label for="localidad">Localidad: </label><div id="localidad">' . $this->localidad . '</div></div>
                    <div><label for="provincia">Provincia: </label><div id="provincia">' . $this->provincia . '</div></div>
                    <div><label for="telefono">Teléfono: </label><div id="telefono">' . $this->telefono . '</div></div>
                    <div><label for="mail">Email: </label><div id="mail">' . $this->mail . '</div></div>
                    <div><label for="sueldo">Sueldo: </label><div id="sueldo">' . $this->sueldo . '</div></div>';
        }

        public function cambiarFecha($fecha_nacimiento){

            $fecha_nueva = new DateTime($fecha_nacimiento);

            $dia = $fecha_nueva->format('d');
            $mes = $fecha_nueva->format('m');
            $anio = $fecha_nueva->format('y');

            $this->fecha_nacimiento = $dia.'-'.$mes.'-'.$anio;
        }



    }

?>