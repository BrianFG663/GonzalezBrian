<?php
session_start();
require_once '../Conexion.php';
require_once '../Clases/Usuario.php';

$row = $_SESSION['row'];
$usuario = new Usuario($row['nombre'],$row['apellido'],$row['mail'],$row['passw'],$row['rol']);
$id = $row['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $usuario->cambiarNombre($conexion, $id, $nombre);
        $nuevo_row = $usuario->buscarUsuario($conexion, $id);
        $_SESSION['row'] = $nuevo_row;
        header('Location: Editar-perfil-administrador.php');
        exit();
    }

    if (isset($_POST['apellido']) && !empty($_POST['apellido'])) {
        $apellido = $_POST['apellido'];
        $usuario->cambiarApellido($conexion, $id, $apellido);
        $nuevo_row = $usuario->buscarUsuario($conexion, $id);
        $_SESSION['row'] = $nuevo_row;
        header('Location: Editar-perfil-administrador.php');
        exit();
    }

    if (isset($_POST['mail']) && !empty($_POST['mail'])) {
        $mail = $_POST['mail'];
        
        $usuario->cambiarMail($conexion, $id, $mail);
        $nuevo_row = $usuario->buscarUsuario($conexion, $id);
        $_SESSION['row'] = $nuevo_row;
        header('Location: Editar-perfil-administrador.php');
        exit();
    }

    if (isset($_POST['contraseña-actual']) && isset($_POST['contraseña-nueva'])) {
        // Lógica para cambiar la contraseña
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../Resources/CSS/Administrador/Editar-perfil-admin.css">
    <link rel="stylesheet" href="../Resources/CSS/Encabezado.css">
    <link rel="shortcut icon" href="../Resources/Images/icono.png" sizes="64x64">
    <script src="../Resources/JS/administrador.js"></script>
    <script src="../Resources/JS/Menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../index.php"><img src="../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-administrador.php"><img src="../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <span id="button" onclick="openNav()">&#9776;</span>
        <div class="cont-menu">
            <a href="/Administradores/Tablas-DB/Materias-db.php"><img src="../Resources/Images/libros.png" class="img-menu-admin"><span class="span-materias">Materias</span></a>
            <a href="/Administradores/Tablas-DB/Institutos-db.php"><img src="../Resources/Images/instituto.png" class="img-menu-admin"><span class="span-institutos">Institutos</span></a>
            <a href="/Administradores/Tablas-DB/Profesores-db.php"><img src="../Resources/Images/profesor.png" class="img-menu-admin"><span class="span-profesor">Profesores</span></a>
            <a href="/Administradores/Tablas-DB/Administradores-db.php"><img src="../Resources/Images/gerente.png" class="img-menu-admin"><span class="admin-span">Administradores</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../Resources/Images/gerente.png" alt="">
            <span class="span-div"><?php echo $row['nombre']." ".$row['apellido'] ?></span>
        </div>
    </div>
</div>
<body>
    <div class="container">
        <div class="informacion-actual">
            <div class="top">INFORMACION ACTUAL</div>
            <div class="container-span">
                <div class="id"><label for="id-span">ID:</label><span><?php echo $row['id']?></span></div>
                <div class="nombre"><label for="nombre-span">NOMBRE:</label><span><?php echo $row['nombre']?></span></div>
                <div class="apellido"><label for="apellido-span">APELLIDO:</label><span><?php echo $row['apellido']?></span></div>
                <div class="mail"><label for="mail-span">MAIL:</label><span><?php echo $row['mail']?></span></div>
                <div class="rol"><label for="rol-span">ROL:</label><span><?php echo $row['rol']?></span></div>
            </div>
        </div>

        <div class="informacion-nueva">
            <div class="top">EDITAR INFORMACION</div>
            <form action="Editar-perfil-administrador.php" method="post" class="container-span-editar" id="formulario-editar">
                <div><label for="nombre">Editar nombre</label><input name="nombre" id="nombre" type="text" autocomplete="off"></div>
                <div><label for="apellido">Editar apellido</label><input name="apellido" id="apellido" type="text" autocomplete="off"></div>
                <div><label for="mail">Editar Mail</label><input name="mail" id="mail" type="text" autocomplete="off"></div>
                <div><label for="contraseña-actual">Contraseña actual</label><input name="contraseña-actual" id="contraseña-actual" type="text" autocomplete="off"></div>
                <div><label for="contraseña-nueva">Contraseña nueva</label><input name="contraseña-nueva" id="contraseña-nueva" type="text" autocomplete="off"></div>
                <div class="container-botones-editar">
                    <input type="submit" value="Menu" id="boton_atras">
                    <input type="button" value="Editar" id="boton_agregar" name="boton_agregar" onclick="editarPerfil()">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
