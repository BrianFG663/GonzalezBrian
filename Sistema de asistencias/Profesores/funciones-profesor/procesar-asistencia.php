<?php
    require_once '../../Conexion.php';
    require_once '../../Clases/Materia.php';

    session_start();
    $materia_id = $_SESSION['id_materia'];
    $instituto_id = $_SESSION['id_instituto'];
    
    if (isset($_POST['asistencia'])) {
        $valor = 1;
        $asistencias = $_POST['asistencia'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d H:i');

        foreach ($asistencias as $id_alumno) {
            $sql_asistencia =
            "INSERT INTO asistencias (alumno_id,fecha_asistencia,materia_id,valor)
            VALUES(:alumno_id,:fecha_asistencia,:materia_id,:valor)";

            $resultado = $conexion->prepare($sql_asistencia);
            $resultado->bindParam(':alumno_id', $id_alumno);
            $resultado->bindParam(':fecha_asistencia', $dia_actual);
            $resultado->bindParam(':materia_id', $materia_id);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();
        }
    
        header('location: tomar-asistencia.php');
        exit();
    }

    if (isset($_POST['media-asistencia'])) {

        $tolerancia = Materia::horaAsistencia($conexion,$materia_id,$instituto_id);
        var_dump($tolerancia);

        if($tolerancia){
            $valor = 0.5;
        }else{
            $valor = 1;
        }

        $asistencias = $_POST['media-asistencia'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d H:i');

        foreach ($asistencias as $id_alumno) {
            $sql_asistencia =
            "INSERT INTO asistencias (alumno_id,fecha_asistencia,materia_id,valor)
            VALUES(:alumno_id,:fecha_asistencia,:materia_id,:valor)";

            $resultado = $conexion->prepare($sql_asistencia);
            $resultado->bindParam(':alumno_id', $id_alumno);
            $resultado->bindParam(':fecha_asistencia', $dia_actual);
            $resultado->bindParam(':materia_id', $materia_id);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();
        }
    }
?>
