<?php
    require_once '../Conexion.php';
    require_once '../Clases/Usuario.php';

 
    $names = ['nombre','apellido','mail','contraseña'];
    $valores = [];

    foreach ($names as $name) {
        if (isset($_POST[$name]) && !empty($_POST[$name])) {
            $valores[$name] = $_POST[$name];
        } else {

        }
    }

    $usuario = new usuario($valores['nombre'],$valores['apellido'],$valores['mail'],$valores['contraseña']);

    $mail=$usuario->verificaEmail($conexion);

    if($mail){
        $usuario->subirBaseDatos($conexion);
    }else{
        header('Location: error-registro.php');
        exit();
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

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   window.onload = function() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = 'registro-admin.php';
    });
};
</script>
</html>






