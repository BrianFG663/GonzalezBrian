<?php 
    include 'C:\GonzalezBrian\Practicas\PHP\Conexion.php';

    $sqluser = 
    "select Id,Nombre,Apellido,Correo,Fecha_nacimiento
    from usuarios";

    $results = $conexion -> query($sqluser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/admin-registrar-empleados.css">
</head>
<body>

<div class="container">
    <h2>Registrar empleados</h2>

    <form action="Admin-registrar-empleado.php" method="post" id="formulario-registro">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido"><br>
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>
        <label for="correo">Correo</label>
        <input type="text" id="correo" name="correo"><br>
        <label for="contraseña">Contraseña</label>
        <input type="text" id="contraseña" name="contraseña"><br>
        <div id="chequear_contraseña"></div>
        <label for="rcontraseña">Repetir contraseña</label>
        <input type="text" id="rcontraseña" name="rcontraseña"><br>
        <div id="comprobar_contraseñas"></div>
        <div class="checkbox-container">
            <div id="administrador">Desea dar administración al empleado?</div>
            <input type="checkbox" id="administrador" name="administrador">
        </div>
        <input type="button" value="Registrar" id="boton-registrar" onclick="verificarRegistro()">
    </form>

    <?php
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fecha_nacimiento']) && isset($_POST['contraseña']) && isset($_POST['correo'])){
            $name = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $contraseña = $_POST['contraseña'];
            $correo = $_POST['correo'];

        $sqlemail = 
        "SELECT Correo
        FROM usuarios 
        WHERE Correo = '$correo'";

        $resultado = $conexion -> query($sqlemail);

        if ($resultado -> num_rows == 0){
            echo '<div class="Registro">Registro creado con exito</div>';

           if(isset($_POST['administrador'])){
                $sqlregister = 
                "insert into usuarios(Nombre,Apellido,Fecha_nacimiento,Correo,Contraseña,Admin)
                values ('$name','$apellido','$fecha_nacimiento','$correo','$contraseña',1)";

                $resultsregister = $conexion -> query($sqlregister);

                '<div class="Registro">Registro creado con exito</div>';
            }else {
                $sqlregister = 
                "insert into usuarios(Nombre,Apellido,Fecha_nacimiento,Correo,Contraseña)
                values ('$name','$apellido','$fecha_nacimiento','$correo','$contraseña')";

                $resultsregister = $conexion -> query($sqlregister);

                echo '<div class="Registro">Registro creado con exito</div>';
            }
        } else{
            echo '<div class="remail">Correo ya registrado</div>';
        }


        }
    ?>

    <form action="Admin.php">
        <input type="submit" value="regresar" class="boton-regresar">
    </form>
</div>

<script src="../JS/FN.js"></script>
</body>
</html>
