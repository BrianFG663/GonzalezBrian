<?php
    require_once '../../Conexion.php';
    require_once '../../Clases/Usuario.php';

    session_start();
    $row = $_SESSION['row'];

    $sql_admin = 
    "SELECT *
    FROM usuario
    WHERE rol = :rol";

    $rol = "administrador";
    $resultado = $conexion->prepare($sql_admin);
    $resultado->bindParam(':rol',$rol);
    $resultado->execute();

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = 
        "SELECT *
        FROM usuario
        WHERE id = :id";

        $resultadosql = $conexion->prepare($sql);
        $resultadosql->bindParam(':id',$id);
        $resultadosql->execute();
        $admin = $resultadosql->fetch(PDO::FETCH_ASSOC);

        $administrador = new Usuario($adminsql['nombre'],$adminsql['apellido'],$adminsql['mail'],$adminsql['passw'],$adminsql['rol']);
        $administrador->eliminarUsuario($conexion,$id);

        header("Location: Administradores-db.php"); //se redirige a la misma pagina para evitar recargar el formulario
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/CSS/Encabezado.css">
    <link rel="stylesheet" href="../../Resources/CSS/menu-desplegable.css">
    <link rel="stylesheet" href="../../Resources/CSS/Administrador/Administrador-db.css">
    <link rel="shortcut icon" href="../../Resources/Images/icono.png" sizes="64x64">
    <script src="../../Resources/JS/Menu.js"></script>
    <title>Administradores</title>
</head>
<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../../index.php"><img src="../../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-administrador.php"><img src="../../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <span id="button" onclick="openNav()">&#9776;</span>
        <div class="cont-menu">
            <a href="../Administrador-index.php"><img src="../../Resources/Images/menu.png" class="img-menu"><span class="admin-span">Menu principal</span></a>
            <a href="Materias-db.php"><img src="../../Resources/Images/libros.png" class="img-menu-admin"><span class="span-materias">Materias</span></a>
            <a href="Institutos-db.php"><img src="../../Resources/Images/instituto.png" class="img-menu-admin"><span class="span-institutos">Institutos</span></a>
            <a href="Profesores-db.php"><img src="../../Resources/Images/profesor.png" class="img-menu-admin"><span class="span-profesor">Profesores</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../../Resources/Images/gerente.png" alt="">
            <span class="span-div"><?php echo  $row['nombre']." ".$row['apellido'] ?></span>
        </div>
    </div>
</div>
<body>
    <div class="contenedor">
        <div class="top-container"><span>ADMINISTRADORES</span></div>
        <div class="contenedor-info-top"><span class="id-top">ID</span><span class="nombre-top">Nombre y apellido</span><span class="correo-top">Correo electronico</span><div class="boton-eliminar-top">¿Desea eliminar administrador?</div></div>
        <?php

while ($result = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="contenedor-info">
            <span class="id">'.$result['id'].'</span>
            <span class="nombre">'.$result['nombre']." ".$result['apellido'].'</span>
            <span class="correo">'.$result['mail'].'</span>
            <div class="boton-eliminar">
                <form action="'.$_SERVER['PHP_SELF'].'" method="post" id="eliminar-admin-' . $result['id'] . '"> <!-- Cambiado aquí -->
                    <input type="hidden" name="id" value="' . $result['id'] . '">
                    <input type="button" class="eliminar-boton" value="Eliminar Instituto" onclick="EliminarAdmin(' . $result['id'] . ')">
                </form>

            </div>
        </div>';
}

?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../Resources/JS/administrador.js"></script>
</html>
