<?php
    require_once '../../Conexion.php';
    session_start();
    $materia_id = $_SESSION['id_materia'];
    
    if (isset($_POST['asistencia'])) {
        $asistencias = $_POST['asistencia'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d H:i');

        foreach ($asistencias as $id_alumno) {
            $sql_asistencia =
            "INSERT INTO asistencias (alumno_id,fecha_asistencia,materia_id)
            VALUES(:alumno_id,:fecha_asistencia,:materia_id)";

            $resultado = $conexion->prepare($sql_asistencia);
            $resultado->bindParam(':alumno_id', $id_alumno);
            $resultado->bindParam(':fecha_asistencia', $dia_actual);
            $resultado->bindParam(':materia_id', $materia_id);
            $resultado->execute();
        }
    
        header('location: tomar-asistencia.php');
        exit();
    }
?>
