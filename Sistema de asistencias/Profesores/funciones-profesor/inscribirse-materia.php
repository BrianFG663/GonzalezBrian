<?php
require_once '../../Conexion.php';
require_once '../../Clases/Materia.php';
session_start();
$rowprofesor = $_SESSION['rowprofesor'];
$instituto_id = $_SESSION['id_instituto'];
var_dump($instituto_id);

$materia = new Materia('prueba','prueba','22-1-2001',1);
$materias_libres=$materia->buscarMateria($conexion,$instituto_id);
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
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../index.php"><img src="../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-profesor.php"><img src="../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <div class="cont-menu">
            <a href="/Administradores/Tablas-DB/Materias-db.php"><img src="../Resources/Images/libros.png" class="img-menu-admin"><span class="span-materias">Materias</span></a>
            <a href="/Administradores/Tablas-DB/Institutos-db.php"><img src="../Resources/Images/instituto.png" class="img-menu-admin"><span class="span-institutos">Institutos</span></a>
            <a href="/Administradores/Tablas-DB/Administradores-db.php"><img src="../Resources/Images/graduado.png" class="img-menu-admin"><span class="alumno-span">Alumnos</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../Resources/Images/profesor.png">
            <span class="span-div"><?php echo  $rowprofesor['nombre']." ".$rowprofesor['apellido'] ?></span>
        </div>
    </div>
</div>
<body>
    <div class="container">
        <div class="top"><button class="button-back" onclick="redireccion(1)"></button><span class="titulo">LISTADO DE ALUMNOS</span></div>
        <div class="alumno-top"><div class="top-id">ID</div><div class="top-nombre">NOMBRE COMPLETO</div><div class="top-dni">DNI</div><div class="top-fecha_nacimiento">FECHA DE NACIMIENTO</div><div class="top-asistencia">ASISTENCIA</div></div>
        <div class="container-alumnos">
            <form action="procesar-asistencia.php" method="post" id="formulario-asistencias">
                <?php
                    var_dump($materias_libres);
                    foreach ($materias_libres as $materias) {
                        //echo $materia['id'];
                    }
                ?>
            </form>
        </div>
        <div class="boton"><input class="boton-tomar-asistencia" type="button" value="SUBIR ASISTENCIA" onclick="formularioAsistencias()"></div>
    </div>
</body>
</html>