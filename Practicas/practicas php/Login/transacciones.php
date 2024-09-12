<?php

require_once '../Conexion.php';
require_once '../Clases/Empleado.php';
require_once '../Clases/Cliente.php';

session_start();
    $usuario=$_SESSION["mail"];
    $contraseña=$_SESSION["contraseña"];

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

    if($row['checkeo'] == 'e'){ //se chequea si es empleado o cliente
        $nuevousuario = new Empleado($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['legajo']);
    }
    if($row['checkeo'] == 'c'){
        $nuevousuario = new Cliente($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['numero_cuenta']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/CSS/transacciones.css">
</head>
<body>
    <div class="informacion-de-cuenta">
        <div class="nombre-title">•Bienvenido <?php echo $nuevousuario->getNombre() ?></div> <div class="nombre-legajo">•Numero de legajo: <?php echo $nuevousuario->legajo ?></div>    <div class="saldo"><span>Saldo actual:</span><span class="cantidad">$<?php echo number_format($nuevousuario->getSueldo(), 2) ?></span></div>
    </div>

    </div>
    <div class="contenedor-general">
        <div class="ingresa-dinero">
        <h5>Ingresa dinero</h5>
            <form action="modificarSaldo.php" method="post">
                <label for="retiro-ingreso">Ingresa cantidad</label>
                <input type="number" name="retiro-ingreso" id="retiro-ingreso">
                <input type="submit" name="ingresar" id="ingresar" value="Ingresar">
            </form>
        </div>

        <div class="retira-dinero">
        <h5>Retira dinero</h5>
            <form action="modificarSaldo.php" method="post">
            <label for="retiro-ingreso">Ingresa cantidad</label>
                <input type="number" name="retiro-ingreso" id="retiro-ingreso">
                <input type="submit" name="retirar" id="retirar" value="Retirar">
            </form>
        </div>

        <div class="transfiere-dinero">
        <h5>Transfiere dinero a otro usuario</h5>
            <form action="modificarSaldo.php" method="post">
                <label for="retiro-ingreso">Ingresa cantidad</label>
                <input type="number" name="retiro-ingreso" id="retiro-ingreso">
                <label for="retiro-ingreso">Ingresa Mail o Telefono de la persona que desea mandar el dinero</label>
                <input type="number" name="mail" id="mail">
                <input type="submit" name="retirar" id="retirar" value="Retirar">
                
            </form>
        </div>
    </div>
</body>
</html>
