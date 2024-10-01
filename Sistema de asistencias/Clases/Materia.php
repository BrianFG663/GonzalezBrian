<?php

include_once(__DIR__ . '/../Resources/Traits/Funciones.php');

class Materia{

    use Funciones;

    public $nombre;
    public $descripcion;
    public $fecha_creacion;
    public $codigo_materia;

    public function __construct($nombre,$descripcion,$fecha_creacion,$codigo_materia){
        
        $this->nombre = $this->mayuscula($nombre);
        $this->descripcion = $descripcion;
        $this->fecha_creacion = $fecha_creacion;
        $this->codigo_materia = $codigo_materia;
    }

    public function comprobarMateria($conexion){
        
        $sql_comprobar = 
        "SELECT *
        FROM materias
        WHERE codigo_materia = :codigo_materia";

        $resultado = $conexion->prepare($sql_comprobar);
        $resultado->bindParam(':codigo_materia', $this->codigo_materia);
        $resultado->execute();

        $row = $resultado->fetch(PDO::FETCH_ASSOC);

        if($row){
            return false;
        }else{
            return true;
        }
    }
    
    public function insertMateria($conexion,$id_instituto) {
        // Insertar la materia
        $sql_insert = 
        "INSERT INTO materias (nombre, descripcion, fecha_creacion, codigo_materia)
        VALUES (:nombre, :descripcion, :fecha_creacion, :codigo_materia)";
        
        $resultado = $conexion->prepare($sql_insert);
        $resultado->bindParam(':nombre', $this->nombre);
        $resultado->bindParam(':descripcion', $this->descripcion);
        $resultado->bindParam(':fecha_creacion', $this->fecha_creacion);
        $resultado->bindParam(':codigo_materia', $this->codigo_materia);
        $resultado->execute();
    
        // Obtener el id de la materia insertada
        $sql_idmateria =
        "SELECT id
        FROM materias
        WHERE codigo_materia = :codigo_materia";
    
        $resultado = $conexion->prepare($sql_idmateria);
        $resultado->bindParam(':codigo_materia', $this->codigo_materia);
        $resultado->execute();
    
        $id = $resultado->fetch(PDO::FETCH_ASSOC);
    
    
        // Insertar en materia_instituto
        $sqlmateria_instituto = 
        "INSERT INTO materia_instituto(materia_id, instituto_id)
        VALUES (:materia_id, :instituto_id)";
    
        $resultado_sql = $conexion->prepare($sqlmateria_instituto);
        $resultado_sql->bindParam(':materia_id', $id['id']); // Asegúrate de pasar solo el ID
        $resultado_sql->bindParam(':instituto_id', $id_instituto);
        $resultado_sql->execute();
    }

    public function eliminarMateria($conexion,$id){
        $sql_eliminar_materia = 
        "DELETE FROM materias
        WHERE id = :id";
        $resultado_eliminar_materia = $conexion->prepare($sql_eliminar_materia);
        $resultado_eliminar_materia->bindParam(':id', $id);
        $resultado_eliminar_materia->execute();

    }

    public function buscarMateria($conexion, $instituto_id) {
        // Consulta para obtener los IDs de las materias
        $sql_materias = 
        "SELECT DISTINCT materia_id
         FROM materia_instituto 
         WHERE instituto_id = :instituto_id";
    
        $resultado = $conexion->prepare($sql_materias);
        $resultado->bindParam(':instituto_id', $instituto_id);
        $resultado->execute();
        $ids_materias = $resultado->fetchAll(PDO::FETCH_COLUMN);
    
        if (count($ids_materias) > 0) {
            // Crear placeholders para la consulta IN
            $array_ids = implode(',', array_fill(0, count($ids_materias), '?'));
    
            $sql_institutos = 
            "SELECT id, nombre
             FROM materias
             WHERE id IN ($array_ids) AND profesor_id IS NULL";
    
            $resultado = $conexion->prepare($sql_institutos);
            
            // Ejecutar con los valores de los IDs
            $resultado->execute($ids_materias);
    
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // No hay materias para ese instituto
            return false;
        }
    }
    
    
}

?>