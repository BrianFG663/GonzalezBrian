<?php

    require 'Empleado.php';

    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        if(isset($_POST['apellido']) && !empty($_POST['apellido'])){
            if(isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento'])){
                if(isset($_POST['dni']) && !empty($_POST['dni'])){
                    if(isset($_POST['localidad']) && !empty($_POST['localidad'])){
                        if(isset($_POST['provincia']) && !empty($_POST['provincia'])){
                            if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
                                if(isset($_POST['mail']) && !empty($_POST['mail'])){
                                    if(isset($_POST['sueldo']) && !empty($_POST['sueldo'])){
                                        if(isset($_POST['sueldo']) && !empty($_POST['sueldo'])){
                                            $nombre = $_POST['nombre'];
                                            $apellido = $_POST['apellido'];
                                            $fecha_nacimiento = $_POST['fecha_nacimiento'];
                                            $dni = $_POST['dni'];
                                            $localidad = $_POST['localidad'];
                                            $provincia = $_POST['provincia'];
                                            $telefono = $_POST['telefono'];
                                            $mail = $_POST['mail'];
                                            $sueldo = $_POST['sueldo'];
                                            $numero = $_POST['numero'];
                                        }
                                    }
                                }
                            }   
                        }
                    }
                }
            }
        }
    }

    if(isset($_POST['empleado'])){
        $empleado = new Empleado($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo,$numero);
        $empleado->__setSueldo($sueldo,$numero);
        $empleado->cambiarFecha($fecha_nacimiento);
    }

    if(isset($_POST['cliente'])){
        $cliente = new Cliente($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo,$numero);
        $cliente->__setSueldo($sueldo);
        $cliente->cambiarFecha($fecha_nacimiento);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylemain.css">
</head>
<body>
<?php
                             
    if(isset($empleado)){
        $mayoria_edad =$empleado->verificarEdad($fecha_nacimiento);

        if($mayoria_edad){
            echo $empleado->mostrarEmpleado();
        }else{
            echo '<div id="menor_edad">Debe ser mayor de edad para ser empleado.</div>';
        }


    }

    if(isset($cliente)){
        echo $cliente->mostrarCliente();
    }
                             
?>
</body>
</html>
