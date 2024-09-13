<?php
    require_once '../Conexion.php';
    require_once '../Clases/Empleado.php';
    require_once '../Clases/Cliente.php';

 
    $names = ['nombre','apellido','fecha_nacimiento','dni','localidad','provincia','telefono','mail','contraseña','rcontraseña','sueldo','numero'];
    $valores = [];

    foreach ($names as $name) {
        if (isset($_POST[$name]) && !empty($_POST[$name])) {
            $valores[$name] = $_POST[$name];
        } else {

        }
    }

    //verificacion checkbox para verificar si selecciono empleado o cliente
    if(isset($_POST['empleado'])){
        $empleado = new Empleado($valores['nombre'],$valores['apellido'],$valores['fecha_nacimiento'],$valores['dni'],$valores['localidad'],$valores['provincia'],$valores['telefono'],$valores['mail'],$valores['contraseña'],$valores['sueldo'],$valores['numero']);
        $empleado->__setSueldo($valores['sueldo'],$valores['numero']);
        $empleado->cambiarFecha($valores['fecha_nacimiento']);
    }

    if(isset($_POST['cliente'])){
        $cliente = new Cliente($valores['nombre'],$valores['apellido'],$valores['fecha_nacimiento'],$valores['dni'],$valores['localidad'],$valores['provincia'],$valores['telefono'],$valores['mail'],$valores['contraseña'],$valores['sueldo'],$valores['numero']);
        $cliente->__setSueldo($valores['sueldo']);
        $cliente->cambiarFecha($valores['fecha_nacimiento']);
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
    <div>
<?php
                            
    if(isset($empleado)){
        if($empleado->verificarEdad($valores['fecha_nacimiento'])){
            if($empleado->verificaEmail($conexion)){
                echo $empleado->mostrarEmpleado();
                $empleado->subirBaseDatos($conexion);
            }
            else{
                echo '<div class="cabecera-error"><img class="check" src="../Imagenes/cruz.png"><spam>Correo electronico ya registrado</spam></div>';
            }
            
        }else{
            echo '<div class="cabecera-error"><img class="check" src="../Imagenes/cruz.png"><spam>Debe ser mayor de edad para ser empleado.</spam></div>';
        }
    }

    if(isset($cliente)){
        if($cliente->verificaEmail($conexion)){
            echo $cliente->mostrarCliente();
            $cliente->subirBaseDatos($conexion);
        }else{
            echo '<div class="cabecera-error"><img class="check" src="../Imagenes/cruz.png"><spam>Correo electronico ya registrado</spam></div>';
        }
    }         
?>



</body>
</html>






