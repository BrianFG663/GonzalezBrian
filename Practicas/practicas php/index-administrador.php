<?php

    session_start();
    $row=$_SESSION['admin'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources/CSS/index-administrador.css">
</head>
<body>

    <h3>Bienvenido <?php echo ucwords($row['nombre']." ".$row['apellido']) ?></h3>

    <div class="contenedor">
        <span class="mensaje">Que desea registrar?</span>
        <input type="button" onclick="indexAdministrador('empleado')" id="empleado" value="Registrar-empleado">
        <input type="button" onclick="indexAdministrador('persona')" id="persona" value="Registrar-persona">
    </div>
    
</body>

<script src="Resources/JS/Fn.js"></script>
</html>