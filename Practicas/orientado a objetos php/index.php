<?php

    require 'Alumno.php';

    $brian = new Persona("Edinson","Cavani",33681175);

    $alumno = new Alumno("brian","gonzalez",43681175,"Programacion")


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3><?php    echo $alumno->mostrarMaterias(); ?></h3>
    
</body>
</html>