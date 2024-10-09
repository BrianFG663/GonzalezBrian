<?php
    require_once '../Conexion.php';
    require_once '../Clases/Profesor.php';
    require_once '../Clases/Materia.php';
    session_start();

    if(isset($_POST['id-materia'])){
        $id_materia = $_POST['id-materia'];
        $_SESSION['id_materia'] = $id_materia;
    }

    $rowprofesor = $_SESSION['rowprofesor'];
    $id_instituto = $_SESSION['id_instituto'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('Y-m-d');

    $alumnoPresentes = Profesor::listadoPresentes($conexion,$id_instituto,$_SESSION['id_materia'],$fecha);
    $alumnoAusentes = Profesor::listadoAusentes($conexion,$id_instituto,$_SESSION['id_materia'],$fecha);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="../Resources/CSS/Profesor/alumno-index.css">
    <link rel="stylesheet" href="../Resources/CSS/Encabezado.css">
    <link rel="stylesheet" href="../Resources/CSS/menu-fijo.css">
    <link rel="shortcut icon" href="../Resources/Images/icono.png" sizes="64x64">
    <script src="../Resources/JS/Profesor.js"></script>
    <script src="../Resources/JS/Menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../index.php"><img src="../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-profesor.php"><img src="../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <div class="cont-menu">
            <a href="profesores-index.php"><img src="../../Resources/Images/menu.png" class="img-menu-admin"><span class="menu-span">Menu principal</span></a>
            <a href="funciones-profesor/tomar-asistencia.php"><img src="../../Resources/Images/tomar-asistencia.png" class="img-menu-admin"><span class="menu-span">Tomar asistencia</span></a>
            <a href="/Administradores/Tablas-DB/Institutos-db.php"><img src="../Resources/Images/instituto.png" class="img-menu-admin"><span class="span-institutos">Institutos</span></a>
            <a href="estado-alumno.php"><img src="../Resources/Images/graduado.png" class="img-menu-admin"><span class="alumno-span">Alumnos</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../Resources/Images/profesor.png">
            <span class="span-div"><?php echo  $rowprofesor['nombre']." ".$rowprofesor['apellido'] ?></span>
        </div>
    </div>
</div>
<body>
    <div class="container">
        <div class="top"><span class="titulo">ALUMNOS PRESENTES</span></div>
        <div class="container-alumnos">
            <form action="funciones-profesor/procesar-asistencia.php" method="post" id="formulario-salida">
                <?php
                    if($alumnoPresentes){
                        echo'<div class="alumno-top"><div class="top-id">ID</div><div class="top-nombre">NOMBRE COMPLETO</div><div class="top-dni">DNI</div><div class="top-fecha_nacimiento">FECHA DE NACIMIENTO</div><div class="top-asistencia">MARCAR SALIDA</div></div>';
                        foreach ($alumnoPresentes as $alumnoPresente) {
                            echo '<div class="alumno"><div class="id">'.$alumnoPresente['id'].'</div><div class="nombre">'.$alumnoPresente['nombre']." ".$alumnoPresente['apellido'].'</div><div class="dni">'.$alumnoPresente['dni'].'</div><div class="fecha_nacimiento">'.$alumnoPresente['fecha_nacimiento'].'</div><input type="checkbox" class="asistencia" name="media-asistencia[]" value="'.$alumnoPresente['id'].'"></div>';
                        }
                    }else{
                        echo '<div class="contenedor-lista-asistencia"><div class="mensaje-asistencias-tomada">Hoy se encuentran todos asuentes😑</div></div>';
                    }
                ?>
            </form>
        </div>

        <?php
        if($alumnoPresentes){
            echo '<div class="boton"><input class="boton-tomar-asistencia" type="button" value="MARCAR SALIDA" onclick="formularioSalida()"></div>';
         }
        ?>
    </div>

    <div class="container">
        <div class="top"></button><span class="titulo">ALUMNOS AUSENTES</span></div>
        <div class="container-alumnos" id="container-alumnos">
            <form action="funciones-profesor/procesar-asistencia.php" method="post" id="formulario-tarde">
                <?php
                    if($alumnoAusentes){
                        echo'<div class="alumno-top"><div class="top-id">ID</div><div class="top-nombre">NOMBRE COMPLETO</div><div class="top-dni">DNI</div><div class="top-fecha_nacimiento">FECHA DE NACIMIENTO</div><div class="top-asistencia">MARCAR LLEGADA</div></div>';
                        foreach ($alumnoAusentes as $alumnoAusente) {
                            echo '<div class="alumno"><div class="id">'.$alumnoAusente['id'].'</div><div class="nombre">'.$alumnoAusente['nombre']." ".$alumnoAusente['apellido'].'</div><div class="dni">'.$alumnoAusente['dni'].'</div><div class="fecha_nacimiento">'.$alumnoAusente['fecha_nacimiento'].'</div><input type="checkbox" class="asistencia" name="asistencia-llegada[]" value="'.$alumnoAusente['id'].'"></div>';
                        }
                    }else{
                        echo '<div class="contenedor-lista-asistencia"><div class="mensaje-asistencias-tomada">Hoy se encuentran todos presentes😦</div></div>';
                    }
                ?>
            </form>
        </div>
        
        <?php
        if($alumnoAusentes){
            echo '<div class="boton"><input class="boton-tomar-asistencia" type="button" value="SUBIR ASISTENCIA" onclick="formularioLlegada()"></div>';
         }
        ?>
        
    </div>

</body>
</html>