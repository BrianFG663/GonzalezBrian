<?php
    require_once '../Conexion.php';
    require_once '../Clases/Empleado.php';
    require_once '../Clases/Cliente.php';
    
    session_start();
    $usuario=$_SESSION["mail"];
    $contraseña=$_SESSION["contraseña"];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha_actual = new DateTime();

    if(isset($usuario) &&!empty($usuario) && isset($contraseña) && !empty($contraseña)){

        $sqluser = 
        "select *
        from personas
        where email = :usuario and contraseña = :contrasena";

        $result=$conexion->prepare($sqluser);
        $result->bindParam(':usuario', $usuario);
        $result->bindParam(':contrasena', $contraseña);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);
    }


?>