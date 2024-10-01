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

        public function institutosProfesor($conexion, $id) {
            $sql_profesor = "
                SELECT id_instituto
                FROM instituto_profesor
                WHERE id_profesor = :id";
        
            $resultado = $conexion->prepare($sql_profesor);
            $resultado->bindParam('id', $id, PDO::PARAM_INT);
            $resultado->execute();
        
            $instituto_ids = $resultado->fetchAll(PDO::FETCH_COLUMN);
        
            // se crea un array del tamaño de la cantidad que tenga institutos_ids asi poder utilizarlo desde la con sulta con IN, sin este array con '?' no se puede ejecutar con pdo ya que es para evitar sql inyection
            $array_ids = implode(',', array_fill(0, count($instituto_ids), '?'));
        
            $sql_institutos = "
                SELECT id, nombre
                FROM instituto
                WHERE id IN ($array_ids)";
        
            $resultado = $conexion->prepare($sql_institutos);
        
            if(count($instituto_ids) > 0){
                $resultado->execute($instituto_ids); //le pasa como parametro el array con los ids
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return false;
            }

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

        public function mostrarMaterias($conexion,$id_profesor,$id_instituto){
            $sql_materias =
            "SELECT DISTINCT m.id, m.nombre
            FROM materias m
            JOIN profesor p ON m.profesor_id = p.id
            JOIN instituto_profesor ip ON p.id = ip.id_profesor
            JOIN materia_instituto mi ON m.id = mi.materia_id
            WHERE p.id = :id_profesor AND mi.instituto_id = :id_instituto;";

            $resultado = $conexion->prepare($sql_materias);
            $resultado->bindParam(':id_profesor',$id_profesor);
            $resultado->bindParam(':id_instituto',$id_instituto);
            $resultado->execute();

            return $resultado->fetchall(PDO::FETCH_ASSOC);
        }

        public function mostrarAlumnos($conexion,$id_materia,$id_instituto){
            $sql_alumnos =
            "SELECT DISTINCT *
            FROM alumno a
            JOIN materia_alumno m ON m.alumno_id = a.id
            WHERE m.materia_id = :materia_id AND a.instituto_id = :id_instituto;";

            
            $resultado = $conexion->prepare($sql_alumnos);
            $resultado->bindParam(':materia_id',$id_materia);
            $resultado->bindParam(':id_instituto',$id_instituto);
            $resultado->execute();

            return $resultado->fetchall(PDO::FETCH_ASSOC);
        }
    }

?>