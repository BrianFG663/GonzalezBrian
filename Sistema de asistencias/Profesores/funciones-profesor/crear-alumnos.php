<?php

    session_start();
    $rowprofesor = $_SESSION['rowprofesor'];
    $instituto_id = $_SESSION['id_instituto'];
    $materia_id = $_SESSION['id_materia'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar profesor</title>
    <link rel="shortcut icon" href="../../Resources/Images/icono.png" sizes="64x64">
    <link rel="stylesheet" href="../../Resources/CSS/Encabezado.css">
    <link rel="stylesheet" href="../../Resources/CSS/Administrador/Agregar-profesor.css">
    <link rel="stylesheet" href="../../Resources/CSS/menu-fijo.css">

    <script src="../../Resources/JS/Profesor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../Resources/JS/Menu.js"></script>
</head>

<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../../index.php"><img src="../../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="../Editar-perfil-administrador.php"><img src="../../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <div class="cont-menu">
            <a href="../profesores-index.php"><img src="../../Resources/Images/menu.png" class="img-menu-admin"><span class="menu-span">Menu principal</span></a>
            <a href="tomar-asistencia.php"><img src="../../Resources/Images/tomar-asistencia.png" class="img-menu-admin"><span class="menu-span">Tomar asistencia</span></a>
            <a href="../estado-alumno.php"><img src="../../Resources/Images/graduado.png" class="img-menu-admin"><span class="alumno-span">Alumnos</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../../Resources/Images/profesor.png">
            <span class="span-div"><?php echo  $rowprofesor['nombre']." ".$rowprofesor['apellido'] ?></span>
        </div>
    </div>
</div>

<body>
    <div class="formulario-materia">
    <h2 class="title">INSCRIBIR ALUMNO</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="inscribir-alumno">
            <div class="container">
                <div class="container-input">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre-alumno" id="nombre-alumno" placeholder="Ingrese nombre" autocomplete="off">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido-alumno" id="apellido-alumno" placeholder="Ingrese apellido" autocomplete="off">
                </div>
                <div class="container-input">
                    <label for="">DNI</label>
                    <input type="text" name="dni-alumno" id="dni-alumno" placeholder="Ingrese DNI" autocomplete="off">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" name="fecha-alumno" id="fecha-alumno" placeholder="Ingrese fecha de nacimiento" autocomplete="off">
                </div>
            </div>
        
            <div class="container-botones">
                <input type="button" value="Menu" id="boton_atras" onclick="redireccion(4)">
                <input type="submit" value="Agregar alumno" id="boton_agregar" name="boton_agregar" onclick="formularioAlumno()">
            </div>
        </form>
    </div>
</body>
</html>

<?php

    require_once '../../Conexion.php';
    require_once '../../Clases/Alumno.php';

    if(isset($_POST['nombre-alumno'])){
        $nombre = $_POST['nombre-alumno'];
        $apellido = $_POST['apellido-alumno'];
        $dni = $_POST['dni-alumno'];
        $fecha_nacimiento =$_POST['fecha-alumno'];

        $alumno = new Alumno($nombre,$apellido,$dni,$fecha_nacimiento);
        $alumno->inscribirAlumno($conexion,$instituto_id,$materia_id);
    }

?>