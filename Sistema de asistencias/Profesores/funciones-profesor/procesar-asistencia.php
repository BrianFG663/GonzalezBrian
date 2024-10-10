<?php
    require_once '../../Conexion.php';
    require_once '../../Clases/Materia.php';

    session_start();
    $materia_id = $_SESSION['id_materia'];
    $instituto_id = $_SESSION['id_instituto'];

    if (isset($_POST['media-asistencia'])) { //quita media asistencia a los alumnos que se retiren antes de la tolerancia

        $tolerancia = Materia::horaAsistencia($conexion,$materia_id,$instituto_id);
        $asistencias = $_POST['media-asistencia'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d');

        if($tolerancia){
            $valor = 0.5;
            foreach ($asistencias as $id_alumno) {
                $sql_salida =
                "UPDATE asistencias
                SET valor = :valor
                WHERE alumno_id = :alumno_id AND DATE(fecha_asistencia) = :dia_actual";
    
                $resultado = $conexion->prepare($sql_salida);
                $resultado->bindParam(':alumno_id', $id_alumno);
                $resultado->bindParam(':valor', $valor);
                $resultado->bindParam(':dia_actual', $dia_actual);
                $resultado->execute();
            }
        }

        var_dump($asistencias);
    }

    // busco si alguno de los dos array llega vacio y no, para poder poner el mensaje de que ya se tomo asistencia aunque no se ponga ningun presente

    if (isset($_POST['asistencia']) || isset($_POST['asistencia-llegada'])) { //busco los valores de alguno de los dos arrays

        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dia_actual = date('Y-m-d H:i');

        if(isset($_POST['asistencia'])){ //en caso de que llegue el de asistencias normales se determina el valor 1 para la asistencia completa
            $asistencias = $_POST['asistencia'];
            $valor = 1;
        }

        if(isset($_POST['asistencia-llegada'])){ //en caso de que llegue el de asistencias de llegadas tarde se analiza si la llegada es dentro de la tolerancia dada y dependiendo eso da el valor
            $tolerancia = Materia::horaAsistencia($conexion,$materia_id,$instituto_id);
            $asistencias = $_POST['asistencia-llegada'];
            if($tolerancia){
                $valor = 0.5;
            }else{
                $valor = 1;
            }

        }

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
    
        header('location: ../listado-alumnos.php');
        exit();
    }


?>
