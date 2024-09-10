<?php
    require_once 'Conexion.php';
    require_once 'Clases\Empleado.php';

 
    $names = ['nombre','apellido','fecha_nacimiento','dni','localidad','provincia','telefono','mail','contraseña','rcontraseña','sueldo','numero'];
    $valores = [];

    foreach ($names as $name) {
        if (isset($_POST[$name]) && !empty($_POST[$name])) {
            $valores[$name] = $_POST[$name];
        } else {

        }
    }

   /* if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        if(isset($_POST['apellido']) && !empty($_POST['apellido'])){
            if(isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento'])){
                if(isset($_POST['dni']) && !empty($_POST['dni'])){
                    if(isset($_POST['localidad']) && !empty($_POST['localidad'])){
                        if(isset($_POST['provincia']) && !empty($_POST['provincia'])){
                            if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
                                if(isset($_POST['mail']) && !empty($_POST['mail'])){
                                    if(isset($_POST['contraseña']) && !empty($_POST['contraseña'])){
                                        if(isset($_POST['rcontraseña']) && !empty($_POST['rcontraseña'])){
                                            if(isset($_POST['sueldo']) && !empty($_POST['sueldo'])){
                                                if(isset($_POST['numero']) && !empty($_POST['numero']))
                                                $nombre = $_POST['nombre'];
                                                $apellido = $_POST['apellido'];
                                                $fecha_nacimiento = $_POST['fecha_nacimiento'];
                                                $dni = $_POST['dni'];
                                                $localidad = $_POST['localidad'];
                                                $provincia = $_POST['provincia'];
                                                $telefono = $_POST['telefono'];
                                                $mail = $_POST['mail'];
                                                $sueldo = $_POST['sueldo'];
                                                $contrasena = $_POST['contraseña'];
                                                $numero_empleado = $_POST['numero'];
                                                $legajo = $_POST['numero'];
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
    }

*/


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
    <link rel="stylesheet" href="Resources\CSS\stylemain.css">
</head>
<body>
<?php
                             
    if(isset($empleado)){

        if($empleado->verificarEdad($valores['fecha_nacimiento'])){
            if($empleado->verificaEmail($conexion)){
                echo $empleado->mostrarEmpleado();
              //  $empleado->subirBaseDatos($conexion); comentado para no subir usuarios en pruebas
            }
            else{
                echo '<div id="menor_edad">Correo electronico ya registrado</div>';
            }
            
        }else{
            echo '<div id="menor_edad">Debe ser mayor de edad para ser empleado.</div>';
        }


    }else{
        echo '<div>
                <form action="main.php" method="post">
                    <input type="number" name="retiro-ingreso" id="retiro-ingreso">
                    <input type="submit" name="retirar" id="retirar" value="Retirar">
                    <input type="submit" name="ingresar" id="ingresar" value="Ingresar">
                </form>
              </div>'; 
    }

    if(isset($cliente)){
        if($cliente->verificaEmail($conexion)){
            echo $cliente->mostrarCliente();
            // $cliente->subirBaseDatos($conexion); comentado para no subir usuarios en pruebas
        }else{
            echo '<div id="menor_edad">Correo electronico ya registrado</div>';
        }
    }else{
        echo '<div>
                <form action="main.php" method="post">
                    <input type="number" name="" id="">
                    <input type="submit" name="retirar" id="retirar" value="Retirar">
                    <input type="submit" name="ingresar" id="ingresar" value="Ingresar">
                </form>
              </div>';
    }            

    //revisar

   /* if(isset($empleado)){
        if(isset($_POST['retirar'])){
            $retiro = $_POST['retiro-ingreso'];
            $empleado->modificaSaldo(false,$retiro,$conexion);
        }

        if(isset($_POST['ingresar'])){
            $ingreso = $_POST['retiro-ingreso'];
            $empleado->modificaSaldo(true,$ingreso,$conexion);
        }
    }

    if(isset($cliente)){
        if(isset($_POST['retirar'])){
            $retiro = $_POST['retiro-ingreso'];
            $cliente->modificaSaldo(false,$retiro,$conexion);
        }

        if(isset($_POST['ingresar'])){
            $ingreso = $_POST['retiro-ingreso'];
            $cliente->modificaSaldo(true,$ingreso,$conexion);
        }
    } */ 
     
?>


</body>
</html>






