<?php

    require_once 'Traits/Funciones.php';
    require_once 'Conexion.php';

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
        protected $contrasena;
        protected $sueldo;

        
    
        public function __construct($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$contrasena,$sueldo){

            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->fecha_nacimiento=$fecha_nacimiento;
            $this->dni=strval($dni);
            $this->localidad=$localidad;
            $this->provincia=$provincia;
            $this->telefono=strval($telefono);
            $this->mail=$mail;
            $this->contrasena=$contrasena;
            $this->sueldo=intval($sueldo);
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

        public function verificaEmail($conexion){
            $sqlmail = 
            "SELECT email
            FROM personas
            WHERE email = :mail";

            $resultado = $conexion->prepare($sqlmail);

            $resultado->bindParam(':mail', $this->mail);
            $resultado->execute();

            $rows = count($resultado->fetchAll());

            if ($rows == 0){
                return true;
            }else{
                return false;
            }

        }

        public function modificaSaldo($operacion,$retiro_ingreso,$conexion){
            if($operacion){
                $saldo = $this->sueldo + $retiro_ingreso;
                $this->sueldo=$saldo;

                $sqlsaldo = 
                "UPDATE nombre_tabla
                SET saldo = :saldo
                WHERE email = :mail";

                $resultado = $conexion->prepare($sqlsaldo);
                $resultado->bindparam(':mail', $this->mail);
                $resultado->bindparam('saldo',$this->sueldo);
                $resultado->execute();

                return '<div>Ingreso exitoso</div>';
            }

            if(!$operacion){
                $saldo = $this->sueldo - $retiro_ingreso;
                $this->sueldo=$saldo;

                $sqlsaldo = 
                "UPDATE nombre_tabla
                SET saldo = :saldo
                WHERE email = :mail";

                $resultado = $conexion->prepare($sqlsaldo);
                $resultado->bindparam(':mail', $this->mail);
                $resultado->bindparam('saldo',$this->sueldo);
                $resultado->execute();

                return '<div>Retiro exitoso</div>';
            }
        }

    }
?>