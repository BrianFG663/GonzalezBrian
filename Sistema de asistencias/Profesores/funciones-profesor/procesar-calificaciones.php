<?php
    require_once '../../Conexion.php';
    require_once '../../Clases/Instituto.php';

    session_start();
    $id_instituto = $_SESSION['id_instituto'];
    $materia_id = $_SESSION['id_materia'];

    $notas = $_POST['notas'];
    $ids = $_POST['id'];
    $tipo = intval($_POST['tipo-examen']);

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $dia_actual = date('Y-m-d');

 //   $ram = Instituto::getRam($conexion,$id_instituto);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $notas = $_POST['notas'];
        $ids = $_POST['id'];
        $tipo = $_POST['tipo-examen'];

        var_dump($tipo);

    
        $notasFiltradas = [];
        $idsFiltrados = [];
    
        foreach ($notas as $index => $nota) {
            if (!empty($nota)) {
                $notasFiltradas[] = $nota;
                $idsFiltrados[] = $ids[$index];
            }
        }

        if($tipo == 2){
            $sql_notas =
            "INSERT INTO notas(alumno_id,nota,fecha_nota,materia_id)
            VALUE(:alumno_id,:nota,:fecha_nota,:materia_id)";

            $resultado = $conexion->prepare($sql_notas);
            $resultado->bindParam(':alumno_id',$idsFiltrado);
            $resultado->bindParam(':nota',$notasFiltradas[$index]);
            $resultado->bindParam(':fecha_nota',$dia_actual);
            $resultado->bindParam(':materia_id',$materia_id);
         //   $resultado->execute();
        }

        foreach($idsFiltrados as $index => $idsFiltrado){

            $sql_notas =
            "INSERT INTO notas(alumno_id,nota,fecha_nota,materia_id)
            VALUE(:alumno_id,:nota,:fecha_nota,:materia_id)";

            $resultado = $conexion->prepare($sql_notas);
            $resultado->bindParam(':alumno_id',$idsFiltrado);
            $resultado->bindParam(':nota',$notasFiltradas[$index]);
            $resultado->bindParam(':fecha_nota',$dia_actual);
            $resultado->bindParam(':materia_id',$materia_id);
         //   $resultado->execute();
        }


    }

    

?>