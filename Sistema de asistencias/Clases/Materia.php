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
    
}

?>