<?php
    require_once '../Conexion.php';
    require_once '../Clases/Empleado.php';
    require_once '../Clases/Cliente.php';

    if(isset($_POST['retirar'])){
        $operacion = false;
        $monto = $_POST['retiro-ingreso'];
    }

    if(isset($_POST['ingresar'])){
        $operacion = true;
        $monto = $_POST['retiro-ingreso'];
    }

    session_start();
    $usuario=$_SESSION["mail"];
    $contraseña=$_SESSION["contraseña"];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha_actual = new DateTime();

    if(isset($usuario) &&!empty($usuario) && isset($contraseña) && !empty($contraseña)){

        $sqluser = 
        "select *
        from personas
        where email = :usuario";

        $result=$conexion->prepare($sqluser);
        $result->bindParam(':usuario', $usuario);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/CSS/modificarSaldo.css">
</head>
<body>
    
    <div class="operacion">
        <?php
        if(password_verify($contraseña,$row['contraseña'])){
            if($row['checkeo'] == 'e'){ //se chequea si es empleado o cliente
                $nuevousuario = new Empleado($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['legajo']);
                echo $nuevousuario->modificaSaldo($operacion,$monto,$conexion);
            }
            if($row['checkeo'] == 'c'){
                $nuevousuario = new Cliente($row['nombre'],$row['apellido'],$row['fecha_nacimiento'],$row['dni'],$row['localidad'],$row['provincia'],$row['telefono'],$row['email'],$row['contraseña'],$row['sueldo'],$row['numero_cuenta']);
                echo $nuevousuario->modificaSaldo($operacion,$monto,$conexion);
            }
        }
        ?>
        <div class="informacion">
            <span><div class="info-text">Cantidad de la operacion: </div><?php echo "$".$monto ?></span>
            <span><div class="info-text">Localidad:</div> <?php echo $nuevousuario->localidad;?>, <?php echo $nuevousuario->provincia;?></span>
            <span><div class="info-text">Fecha: </div><?php echo $fecha_actual->format('Y-m-d') ?></span>
            <span><div class="info-text">Hora: </div><?php echo $fecha_actual->format('h:i:s') ?></span>
        </div>
        <div class="redireccion">
            <div>¿Desea realizar otra transaccion?</div>
            <input type="submit" name="retirar" id="retirar" value="Ir a tus transacciones" onclick="transacciones()">
        </div>
    </div>

    <div class="informacion-de-cuenta">
        <div class="nombre-title">•Usuario: <?php echo $nuevousuario->getNombre() ?></div> <div class="nombre-legajo">•Numero de legajo: <?php echo $nuevousuario->legajo ?></div>    <div class="saldo"><span>Saldo actual:</span><span class="cantidad">$<?php echo number_format($nuevousuario->getSueldo(), 2) ?></span></div>
    </div>


</body>
<script src="../Resources/JS/Fn.js"></script>
</html>


