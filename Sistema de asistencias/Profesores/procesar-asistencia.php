<?php
    require_once '../Conexion.php';
    session_start();
    
    if (isset($_POST['asistencia'])) {
        $asistencias = $_POST['asistencia'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d H:i');

        foreach ($asistencias as $id_alumno) {
            $sql_asistencia =
            "INSERT INTO asistencias (alumno_id,fecha_asistencia)
            VALUES(:alumno_id,:fecha_asistencia)";

            $resultado = $conexion->prepare($sql_asistencia);
            $resultado->bindParam(':alumno_id', $id_alumno);
            $resultado->bindParam(':fecha_asistencia', $dia_actual);
            $resultado->execute();
            echo"alumno ".$id_alumno;
        }
    }
?>
