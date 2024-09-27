<?php
    include_once(__DIR__ . '/../Resources/Traits/Funciones.php');

    class Profesor{
        use Funciones;

        public $nombre;
        public $apellido;
        protected $dni;
        protected $legajo;

        public function __construct($nombre,$apellido,$dni,$legajo){
            $this->nombre = $this->uperCase($nombre);
            $this->apellido = $this->uperCase($apellido);
            $this->dni = $dni;
            $this->legajo = $legajo;
        }

        public function institutosProfesor($conexion,$id){
            $sql_profesor = 
            "SELECT instituto_id
            FROM profesor
            WHERE id = :id";

            $resultado = $conexion->prepare($sql_profesor);
            $resultado->bindParam('id', $id);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            $instituto_id = $row['instituto_id'];

            $sql_institutos =
            "SELECT id,nombre
            FROM instituto
            WHERE id = :instituto_id";

            $resultado = $conexion->prepare($sql_institutos);
            $resultado->bindParam('instituto_id', $instituto_id);
            $resultado->execute();
            $row_institutos = $resultado->fetch(PDO::FETCH_ASSOC);

            return $row_institutos;
        }

        public function insertProfesor($conexion){

            $sql_insert = 
            "INSERT INTO profesor(nombre,apellido,dni,legajo)
            VALUE (:nombre, :apellido, :dni, :legajo)";

            $resultado = $conexion->prepare($sql_insert);
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':apellido', $this->apellido);
            $resultado->bindParam(':dni', $this->dni);
            $resultado->bindParam(':legajo',$this->legajo);
            $resultado->execute();
        }

        public function comprobarDni($conexion){
            $sql_dni = 
            "SELECT dni
            FROM profesor
            WHERE dni = :dni";

            $resultado = $conexion->prepare($sql_dni);
            $resultado->bindParam(':dni', $this->dni);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);

            if($row){
                return false;
            }else{
                return true;
            }

        }

        public function comprobarlegajo($conexion){
            $sql_dni = 
            "SELECT legajo
            FROM profesor
            WHERE legajo = :legajo";

            $resultado = $conexion->prepare($sql_dni);
            $resultado->bindParam(':legajo', $this->legajo);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);

            if($row){
                return false;
            }else{
                return true;
            }

        }

        public function eliminarProfesor($conexion,$id){
            $sql_eliminar_profesor = 
            "DELETE FROM profesor 
            WHERE id = :id";
            $resultado_eliminar = $conexion->prepare($sql_eliminar_profesor);
            $resultado_eliminar->bindParam(':id', $id);
            $resultado_eliminar->execute();
    
    
            $sql_eliminar_profesor_materia = 
            "DELETE FROM materia_profesor 
            WHERE profesor_id = :id";
            $resultado_eliminar = $conexion->prepare($sql_eliminar_profesor_materia);
            $resultado_eliminar->bindParam(':id', $id);
            $resultado_eliminar->execute();
    
        }
    }

?>