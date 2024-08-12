<?php
    include 'Conexion.php';

    if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        
        $sqluser = 
        "select *
        from usuarios
        where Correo = '$usuario' and Contraseña = '$contraseña'";

        $result = $conexion -> query($sqluser);

            if ($result -> num_rows > 0){
                $row = $result->fetch_assoc();
                $admin = $row['Admin'];

                if ($admin == 1){
                    header('location:\Admin\Admin.php');
                }else{
                    header('location:\User\User.php');
                }
            }

    }else{
        echo "Por favor ingrese usuario y contraseña";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Ingreso.css">
</head>
<body>
    <div class="Usuario-no-encontrado">
        <img src="Imagenes/equis.png">
        <div>Usuario no encontrado</div>
        <form action="index.php">
            <input type="submit" value="Reintentar">
        </form>
    </div>
</body>
</html>