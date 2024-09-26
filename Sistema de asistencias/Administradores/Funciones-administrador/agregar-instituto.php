<?php
session_start();
$row = $_SESSION['row'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar instituto</title>
    <link rel="stylesheet" href="../../Resources/CSS/Administrador/Agregar-institutos.css">
    <link rel="stylesheet" href="../../Resources/CSS/Encabezado.css">
    <link rel="shortcut icon" href="../../Resources/Images/icono.png" sizes="64x64">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../Resources/JS/administrador.js"></script>
    <script src="../../Resources/JS/Menu.js"></script>
</head>

<!-- encabezado superior -->

<header class="encabezado">
    <img class="imagen-encabezado" src="../../Resources/Images/director-de-escuela.png">
    <span class="bienvenido">Asist-o-Matic</span>

    <div class="container-button">
        <div><a href="../../index.php"><img src="../../Resources/Images/cerrar-sesion.png" class="img-session"><span class="span-sesion">CERRAR SESION</span></a></div>
        <div><a href="Editar-perfil-administrador.php"><img src="../../Resources/Images/avatar-de-usuario.png" class="img-perfil"><span class="span-perfil">EDITAR PERFIL</span></a></div>
    </div>
</header>

<!-- menu lateral -->

<div class="menu-container">
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <span id="button" onclick="openNav()">&#9776;</span>
        <div class="cont-menu">
            <a href="../Administrador-index.php"><img src="../../Resources/Images/menu.png" class="img-menu"><span class="admin-span">Menu principal</span></a>
            <a href="Agregar-materia.php"><img src="../../Resources/Images/libros.png" class="img-menu"><span>Agregar materia</span></a>
            <a href="Agregar-profesor.php"><img src="../../Resources/Images/profesor.png" class="img-menu"><span>Agregar profesor</span></a>
            <a href="agregar-administrador.php"><img src="../../Resources/Images/gerente.png" class="img-menu"><span class="admin-span">Agregar admin</span></a>
        </div>
        <div class="botton-div">
            <img class="image-div" src="../../Resources/Images/gerente.png" alt="">
            <span class="span-div"><?php echo $row['nombre']." ".$row['apellido'] ?></span>
        </div>
    </div>

</div>

<!-- cuerpo central -->

<body>

    <div class="formulario-instituto">
    <h2 class="title">INSCRIBIR INSTITUTO</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="inscribir-instituto">
            <label for="nombre_instituto">Nombre del instituto</label>
            <input type="text" name="nombre_instituto" id="nombre_instituto" placeholder="Ingrese nombre del instituto" autocomplete="off">
            <label for="direccion_instituto">Direccion del instituto</label>
            <input type="text" name="direccion_instituto" id="direccion_instituto" placeholder="Escribe la direccion del instituto" autocomplete="off">
            <label for="cue_instituto">C.U.E del instituto</label>
            <input type="text" name="cue_instituto" id="cue_instituto" placeholder="C.U.E del instituto" autocomplete="off">
            <label for="gestion_instituto">Seleccione la gestion del instituto</label>
            <select name="gestion_instituto" id="gestion_instituto" class="styled-select">
                <option value="privado">Privada</option>
                <option value="publico">Publica</option>
            </select>
            <div class="container-botones">
                <input type="button" value="Menu" id="boton_atras" onclick="redireccion(7)">
                <input type="button" value="Agregar instituto" id="boton_agregar" name="boton_agregar" onclick="formularioInstituto(2)">
            </div>
        </form>
    </div>
</body>

</html>

<?php

    include_once '../../Clases/Instituto.php';
    include_once '../../Conexion.php';

    if(isset($_POST['nombre_instituto'])){
        $nombre = $_POST['nombre_instituto'];
        $direccion = $_POST['direccion_instituto'];
        $cue = $_POST['cue_instituto'];
        $gestion = $_POST['gestion_instituto'];

        
        $instituto = new Instituto($nombre,$direccion,$gestion,$cue);
        $validarcue = $instituto->comprobarCue($conexion);
        $validarnombre = $instituto->comprobarNombre($conexion);

        if($validarcue){
            if($validarnombre){
                $instituto->insertInstituto($conexion);

                echo '<script> 
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Instituto agregado con exito",
                    showConfirmButton: false,
                    timer: 1500
                    });
                  </script>';
            }else{
                echo '<script> 
                Swal.fire({
                icon: "error",
                title: "Error",
                text: "Ya existe un instituto con este nombre",
                });
            </script>';
            }
        }else{
            echo '<script> 
                    Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Esta instituto ya existe",
                    });
                </script>';
        }
    }
    

?>
