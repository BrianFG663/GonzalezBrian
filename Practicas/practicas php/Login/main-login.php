<?php
    
    require_once '../Conexion.php';
    require_once '../Clases/Cliente.php';
    require_once '../Clases/Empleado.php';

    if(isset($_POST["email"]) &&!empty($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["pass"])){
        $usuario = $_POST["email"];
        $contraseña = $_POST["pass"];

        $sqluser = 
        "select *
        from personas
        where email = :usuario and contraseña = :contrasena";

        $result=$conexion->prepare($sqluser);
        $result->bindParam(':usuario', $usuario);
        $result->bindParam(':contrasena', $contraseña);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC); //ESTE METODO SE UTILIZA SOLO PARA CUANDO HAY UNA FILA COMO RESULTADO, YA QUE DE OTRA MANERA SE USARIA CON UN FOR PARA TRAER UN ARRAY CON LOS RESULTADOS
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/CSS/stylemain.css">
</head>
<body>
    <?php

    session_start();
    if (!$row){
        echo "usuario no existe";
    }else{
        if($row['checkeo'] == 'e'){ //se chequea si es empleado o cliente
            $nuevousuario = new Empleado($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['legajo']);

            echo $nuevousuario->mostrarEmpleado();
            $_SESSION['mail']=$row['email'];
            $_SESSION['contraseña']=$row['contraseña'];
        }
        if($row['checkeo'] == 'c'){
            $nuevousuario = new Cliente($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['numero_cuenta']);
            echo $nuevousuario->mostrarCliente();
            $_SESSION['mail']=$row['email'];
            $_SESSION['contraseña']=$row['contraseña'];
        }
    }

    ?>
</body>

<script src="../Resources/JS/Fn.js"></script>
</html>