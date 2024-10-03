<?php

    include_once(__DIR__ . '/../Resources/Traits/Funciones.php');
    

    class Alumno{
        use Funciones;
        
        public $nombre;
        public $apellido;
        protected $dni;
        protected $fecha_nacimiento;

        public function __construct($nombre,$apellido,$dni,$fecha_nacimiento){

            $this->nombre =  $this->uperCase($nombre);
            $this->apellido = $this->uperCase($apellido);
            $this->dni = $dni;
            $this->fecha_nacimiento = $fecha_nacimiento;
        }

        public function inscribirAlumno($conexion,$instituto_id,$materia_id){

            $sql_alumno =
            "INSERT INTO alumno (nombre,apellido,dni,fecha_nacimiento,instituto_id)
            VALUES (:nombre, :apellido, :dni, :fecha_nacimiento,:instituto_id)";

            $resultado = $conexion->prepare($sql_alumno);
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':apellido', $this->apellido);
            $resultado->bindParam(':dni', $this->dni);
            $resultado->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
            $resultado->bindParam(':instituto_id', $instituto_id);
            $resultado->execute();

            $alumno_id = $conexion->lastInsertId();

            $sql_materia_alumno = 
            "INSERT INTO materia_alumno(alumno_id,materia_id)
            VALUES (:alumno_id,:materia_id)";

            $resultado = $conexion->prepare($sql_materia_alumno);
            $resultado->bindParam(':alumno_id', $alumno_id);
            $resultado->bindParam(':materia_id',$materia_id);
            $resultado->execute();
        }
    }

?>