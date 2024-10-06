<?php
    include_once '../../Conexion.php';
    require_once '../../Clases/Profesor.php';
    session_start();

    $rowprofesor = $_SESSION['rowprofesor'];
    $id = $rowprofesor['id'];
    $profesor = new Profesor($rowprofesor['nombre'],$rowprofesor['apellido'],$rowprofesor['dni'],$rowprofesor['legajo']);
    $institutos_profesor = $profesor->institutosProfesor($conexion,$id);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../../Resources/CSS/Profesor/profesor-index.css">
    <link rel="stylesheet" href="../../Resources/CSS/Encabezado.css">
    <link rel="stylesheet" href="../../Resources/CSS/menu-fijo.css">
    <link rel="shortcut icon" href="../Resources/Images/icono.png" sizes="64x64">
    <script src="../../Resources/JS/Menu.js"></script>
    <script src="../../Resources/JS/Profesor.js"></script>
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../../index.php"><img src="../../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-profesor.php"><img src="../../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <div class="cont-menu">
            <a href="../profesores-index.php"><img src="../../Resources/Images/menu.png" class="img-menu-admin"><span class="admin-span">Menu principal</span></a>
            <a href="/Administradores/Tablas-DB/Administradores-db.php"><img src="../../Resources/Images/calificaciones.png" class="img-menu-admin"><span class="calificaciones-span">calificaciones</span></a>
            <a href="/Administradores/Tablas-DB/Administradores-db.php"><img src="../../Resources/Images/graduado.png" class="img-menu-admin"><span class="alumno-span">Alumnos</span></a>
            <a href="/Administradores/Tablas-DB/Institutos-db.php"><img src="../../Resources/Images/inscribir-instituto.png" class="img-menu-admin"><span class="span-institutos">Institutos</span></a>
            <a href="/Administradores/Tablas-DB/Institutos-db.php"><img src="../../Resources/Images/agregar materia.png" class="img-menu-admin"><span class="span-institutos">Materias</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../../Resources/Images/profesor.png">
            <span class="span-div"><?php echo  $rowprofesor['nombre']." ".$rowprofesor['apellido'] ?></span>
        </div>
    </div>
</div>

<body> 

</body>
</html>

