<?php

    require_once '../Conexion.php';
    require_once '../Traits/Funciones.php';

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

            $this->nombre= $this->uperCase($nombre);
            $this->apellido= $this->uperCase($apellido);
            $this->fecha_nacimiento=$fecha_nacimiento;
            $this->dni=strval($dni);
            $this->localidad=$this->uperCase($localidad);
            $this->provincia=$this->uperCase($provincia);
            $this->telefono=strval($telefono);
            $this->mail=$mail;
            $this->contrasena=$contrasena;
            $this->sueldo=intval($sueldo);
        }

        public function getSueldo(){
            return $this->sueldo;
        }

        public function getNombre(){
            return $this->nombre." ".$this->apellido;
        }

        public function mostrarInfo(){
            return '<div class="contenedor-informacion">
                        <h2>Datos del cliente:</h2>
                        <div class="informacion1">
                        <div><label for="nombre">Nombre: </label><div id="nombre">' . $this->nombre . '</div></div>
                        <div><label for="apellido">Apellido: </label><div id="apellido">' . $this->apellido . '</div></div>
                        <div><label for="fecha_nacimiento">Fecha de Nacimiento: </label><div id="fecha_nacimiento">' . $this->fecha_nacimiento . '</div></div>
                        <div><label for="dni">DNI: </label><div id="dni">' . $this->dni . '</div></div>
                        </div>

                        <div class="informacion2">
                        <div><label for="localidad">Localidad: </label><div id="localidad">' . $this->localidad . '</div></div>
                        <div><label for="telefono">Teléfono: </label><div id="telefono">' . $this->telefono . '</div></div>
                        <div><label for="mail">Email: </label><div id="mail">' . $this->mail . '</div></div>
                        <div><label for="sueldo">Sueldo: </label><div id="sueldo">' . $this->sueldo . '</div></div>
                        </div>
                    </div>';
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

            if(!$operacion){
                if($retiro_ingreso<=$this->sueldo){
                    $saldo = $this->sueldo - $retiro_ingreso;
                    $this->sueldo=$saldo;
    
                    $sqlsaldo = 
                    "UPDATE personas
                    SET sueldo = :saldo
                    WHERE email = :mail";
    
                    $resultado = $conexion->prepare($sqlsaldo);
                    $resultado->bindparam(':mail', $this->mail);
                    $resultado->bindparam('saldo',$this->sueldo);
                    $resultado->execute();
    
                    return '<div class="cabecera"><img class="check" src="../Imagenes/check.png"><spam>Retiro de dinero exitoso</spam></div>';
                }else{
                    return '<div class="cabecera-error"><img class="check" src="../Imagenes/cruz.png"><spam>Saldo insuficiente, pruebe con un monto menor.</spam></div>';
                }
            }
    

            if($operacion){
                $saldo = $this->sueldo + $retiro_ingreso;
                $this->sueldo=$saldo;

                $sqlsaldo = 
                "UPDATE personas
                SET sueldo = :saldo
                WHERE email = :mail";

                $resultado = $conexion->prepare($sqlsaldo);
                $resultado->bindparam(':mail', $this->mail);
                $resultado->bindparam('saldo',$this->sueldo);
                $resultado->execute();

                return  '<div class="cabecera"><img class="check" src="../Imagenes/check.png">Ingreso de dinero exitoso</div>';
            }
      
        }

        public function transferencia($conexion,$monto,$contacto){
            $sqltransferencia = 
            "UPDATE personas
            SET sueldo= sueldo + :monto
            WHERE email = :contacto OR telefono = :contacto";

            $resultado =$conexion->prepare($sqltransferencia);
            $resultado->bindParam(':contacto',$contacto);
            $resultado->bindParam('monto',$monto);
            $resultado->execute();
        }

    }
?>