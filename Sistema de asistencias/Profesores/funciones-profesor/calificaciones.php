<?php

require_once '../../Conexion.php';
require_once '../../Clases/Profesor.php';
session_start();

$rowprofesor = $_SESSION['rowprofesor'];
$id_instituto = $_SESSION['id_instituto'];
$profesor = new Profesor($rowprofesor['nombre'],$rowprofesor['apellido'],$rowprofesor['dni'],$rowprofesor['legajo']);
$alumnos = $profesor->mostrarAlumnos($conexion,$_SESSION['id_materia'],$id_instituto);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="../../Resources/CSS/Profesor/alumno-index.css">
    <link rel="stylesheet" href="../../Resources/CSS/Encabezado.css">
    <link rel="stylesheet" href="../../Resources/CSS/menu-fijo.css">
    <link rel="shortcut icon" href="../../Resources/Images/icono.png" sizes="64x64">
    <script src="../../Resources/JS/Profesor.js"></script>
    <script src="../../Resources/JS/Menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../../index.php"><img src="../../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="../Editar-perfil-profesor.php"><img src="../../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <div class="cont-menu">
            <a href="../profesores-index.php"><img src="../../Resources/Images/menu.png" class="img-menu-admin"><span class="menu-span">Menu principal</span></a>
            <a href="tomar-asistencia.php"><img src="../../Resources/Images/tomar-asistencia.png" class="img-menu-admin"><span class="menu-span">Tomar asistencia</span></a>
            <a href="../estado-alumno.php"><img src="../../Resources/Images/graduado.png" class="img-menu-admin"><span class="alumno-span">Alumnos</span></a>
            <a href="crear-alumnos.php"><img src="../../Resources/Images/agregar alumno.png" class="img-menu-admin"><span class="agregar-alumno-span">Agregar alumno</span></a>
            <a href="eliminar-alumnos.php"><img src="../../Resources/Images/eliminar-alumno.png" class="img-menu-admin"><span class="agregar-alumno-span">eliminar alumno</span></a>

        </div>
        <div class="botton-div">
            <img class="image-div" src="../../Resources/Images/profesor.png">
            <span class="span-div"><?php echo  $rowprofesor['nombre']." ".$rowprofesor['apellido'] ?></span>
        </div>
    </div>
</div>

<body>
<div class="container">
        <div class="top"></button><span class="titulo">LISTADO DE ALUMNOS</span></div>
        <div class="container-alumnos">
            <form action="procesar-calificaciones.php" method="post" id="formulario-calificaciones"> 
                <?php
                    if (!$alumnos) {
                        echo '<input type="button" value="INSCRIBIR ALUMNOS" class="boton-inscribir-alumnos" onclick="redireccion(3)">';
                    } else {
                        echo'<div class="alumno-top"><div class="calificacion-top-nombre">NOMBRE COMPLETO</div><div class="calificacion-top-dni">DNI</div><div class="calificacion-top-fecha_nacimiento">FECHA DE NACIMIENTO</div><div class="calificacion-top-asistencia">INGRESAR NOTA</div></div>';
                        foreach($alumnos as $alumno){
                            echo '<div class="alumno"><div class="calificacion-nombre">'.$alumno['nombre']." ".$alumno['apellido'].'</div><div class="calificacion-dni">'.$alumno['dni'].'</div><div class="calificacion-fecha_nacimiento">'.$alumno['fecha_nacimiento'].'</div><div class="calificacion-clasificacion"><input class="input-notas" type="number" name="notas[]"><input type="hidden" name="id[]" value="'.$alumno['id'].'"></div></div>';
                        }
                    }
                ?>
        </div>

        <div class="container-botton">
            <div>
                <label for="tipo-examen">Seleccione tipo de examen</label>
                <select class="styled-select" name="tipo-examen" id="tipo-examen">
                    <option value="1">PARCIAL</option>
                    <option value="2">RECUPERATORIO</option>
                    <option value="3">TRABAJO PRACTICO</option>
                </select>
            </div>
                <input class="subir-calificaciones" type="button" value="SUBIR CALIFICACIOnES" onclick="formularioCalificaciones()">
            </div>
            </form>
        </div>
    <?php
    


    ?>
</body>
</html>