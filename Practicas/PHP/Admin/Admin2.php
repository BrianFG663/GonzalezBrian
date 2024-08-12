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
    <link rel="stylesheet" href="C:\GonzalezBrian\Practicas\PHP\CSS\style-admin.css">
</head>
<body>

<?php

    if ($results -> num_rows > 0){
        echo '<table>';
        echo '<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Fecha de nacimiento</th></tr>';
        echo '</table>';

        while($row = $results -> fetch_assoc()){
        echo '<table>';
        echo '<tr><td>'.$row['Id'].'</td><td>'.$row['Nombre'].'</td><td>'.$row['Apellido'].'</td><td>'.$row['Correo'].'</td><td>'.$row['Fecha_nacimiento'].'</td></tr>';
        echo '</table>';
        }
    }

?>

<form action="Admin.php" method="post" id="formulario-registro">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido"><br>
    <label for="fecha_nacimiento">Fecha de nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>
    <label for="">Correo</label>
    <input type="text" id="correo" name="correo"><br>
    <label for="contraseña">Contraseña</label>
    <input type="text" id="contraseña" name="contraseña"><br>
    <div id="chequear_contraseña"></div>
    <label for="rcontraseña">Repetir contraseña</label>
    <input type="text" id="rcontraseña" name="rcontraseña"><br>
    <div id="comprobar_contraseñas"></div>
    <div class="checkbox-container">
        <label for="administrador">Desea dar administración al empleado?</label>
        <input type="checkbox" id="administrador" name="administrador">
    </div>
    <input type="button" value="Subir" id="boton-registrar" onclick="verificarRegistro()">
</form>

<?php

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fecha_nacimiento']) && isset($_POST['contraseña']) && isset($_POST['correo'])){
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];
        $correo = $_POST['correo'];

        if(isset($_POST['administrador'])){
            $sqlregister = 
            "insert into usuarios(Nombre,Apellido,Fecha_nacimiento,Correo,Contraseña,Admin)
            values ('$name','$apellido','$fecha_nacimiento','$correo','$contraseña',1)";

            $resultsregister = $conexion -> query($sqlregister);

            echo "Registro creado con exito";
        }else {
            $sqlregister = 
            "insert into usuarios(Nombre,Apellido,Fecha_nacimiento,Correo,Contraseña)
            values ('$name','$apellido','$fecha_nacimiento','$correo','$contraseña')";

            $resultsregister = $conexion -> query($sqlregister);

            echo "Registro creado con exito";
        }
    }
?>
    
</body>

<script src="FN.js"></script>
</html>