<?php

    require 'Empleado.php';

    if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
        if(isset($_GET['apellido']) && !empty($_GET['apellido'])){
            if(isset($_GET['fecha_nacimiento']) && !empty($_GET['fecha_nacimiento'])){
                if(isset($_GET['dni']) && !empty($_GET['dni'])){
                    if(isset($_GET['localidad']) && !empty($_GET['localidad'])){
                        if(isset($_GET['provincia']) && !empty($_GET['provincia'])){
                            if(isset($_GET['telefono']) && !empty($_GET['telefono'])){
                                if(isset($_GET['mail']) && !empty($_GET['mail'])){
                                    if(isset($_GET['sueldo']) && !empty($_GET['sueldo'])){
                                        if(isset($_GET['sueldo']) && !empty($_GET['sueldo'])){
                                            $nombre = $_GET['nombre'];
                                            $apellido = $_GET['apellido'];
                                            $fecha_nacimiento = $_GET['fecha_nacimiento'];
                                            $dni = $_GET['dni'];
                                            $localidad = $_GET['localidad'];
                                            $provincia = $_GET['provincia'];
                                            $telefono = $_GET['telefono'];
                                            $mail = $_GET['mail'];
                                            $sueldo = $_GET['sueldo'];
                                            $numero = $_GET['numero'];
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

    if(isset($_GET['empleado'])){
        $empleado = new Empleado($nombre,$apellido,$fecha_nacimiento,$dni,$localidad,$provincia,$telefono,$mail,$sueldo,$numero);
        $empleado->__setSueldo($sueldo,$numero);
        $empleado->cambiarFecha($fecha_nacimiento);
    }

    if(isset($_GET['cliente'])){
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
