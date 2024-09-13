<?php
    
    require_once 'Conexion.php';

    if(isset($_POST["email"]) &&!empty($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["pass"])){
        $correo = $_POST["email"];
        $contraseña = $_POST["pass"];

        $sqladmin = 
        "SELECT *
        FROM usuarios
        WHERE correo = :correo";

        $result=$conexion->prepare($sqladmin);
        $result->bindParam(':correo', $correo);
        $result->execute();

        $rowadmin = $result->fetch(PDO::FETCH_ASSOC);

        $sqluser=
        "SELECT *
        FROM personas
        WHERE email = :email";

        $resultado = $conexion->prepare($sqluser);
        $resultado-> bindParam(':email', $correo);
        $resultado->execute();

        $rowuser = $resultado->fetch(PDO::FETCH_ASSOC);

        if($rowadmin){
            if(password_verify($contraseña, $rowadmin['contraseña'])){
                session_start();
                $_SESSION["mail"]=$correo;
                $_SESSION["contraseña"]=$contraseña;
                $_SESSION['admin']=$rowadmin;
                header('Location: index-administrador.php');
                exit;
            }
        }

        
        if($rowuser){
            if(password_verify($contraseña, $rowuser['contraseña'])){
                session_start();
                $_SESSION["mail"]=$correo;
                $_SESSION["contraseña"]=$contraseña;
                $_SESSION['usuario']=$rowusuario;
                header('Location: Transacciones/transacciones.php');
                exit();
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   window.onload = function() {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Usuario inexistente!"
    }).then(() => {
        window.location.href = 'index.php';
    });
};
</script>

</html>

