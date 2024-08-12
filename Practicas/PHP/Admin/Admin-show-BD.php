<?php 
    include 'C:\GonzalezBrian\Practicas\PHP\Conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Admin-show-BD.css">
</head>

<body>

    <div class="container-title">
        <img src="/Practicas/PHP/Imagenes/bd.png" alt="">
        <h2>Base de datos "Nombre de empresa"</h2>
    </div>

    <div class="container-bd">
        
        <div class="container-filtros">
            <div class="formulario-filtro">
                <form action="Admin-show-BD.php" method="get">
                    <label for="id-input">ID</label>
                    <input type="number" name="filtro-id" id="id-input">
                    <input type="submit" value="Filtrar" class="filtrar-boton">
                </form>

                <form action="Admin-show-BD.php" method="get">
                    <label for="name-input">Nombre</label>
                    <input type="text" name="filtro-name" id="name-input">
                    <input type="submit" value="Filtrar" class="filtrar-boton">
                </form>

                <?php
                if (isset($_GET['filtro-name']) || isset($_GET['filtro-id'])) {
                    echo '<form action="Admin-show-BD.php" method="get">
                            <input type="submit" value="Quitar filtro" class="quitar-filtro">
                          </form>';
                }
                ?>
            </div>
        </div>

        <?php

        
        if(!isset($_GET['filtro-name']) && !isset($_GET['filtro-id'])){

            $sqluser = 
            "SELECT Id,Nombre,Apellido,Correo,Fecha_nacimiento
            FROM usuarios";

            $results = $conexion -> query($sqluser);

            if ($results -> num_rows > 0){
                echo '<table>';
                echo '<tr><th class="id">ID</th><th class="nombre">Nombre</th><th class="apellido">Apellido</th><th class="correo">Correo</th><th class="fecha">Fecha de nacimiento</th></tr>';
                echo '</table>';

                while($row = $results -> fetch_assoc()){
                echo '<table>';
                echo '<tr><td class="id">'.$row['Id'].'</td><td class="nombre">'.$row['Nombre'].'</td><td class="apellido">'.$row['Apellido'].'</td><td class="correo">'.$row['Correo'].'</td><td class="fecha">'.$row['Fecha_nacimiento'].'</td></tr>';
                echo '</table>';
                }
            }
        }

        // Filtrar por nombre o apellido
        if (isset($_GET['filtro-name'])) {
            $filter = $_GET['filtro-name'];
            $sqlfilter = "SELECT Id, Nombre, Apellido, Correo, Fecha_nacimiento 
                          FROM usuarios
                          WHERE Nombre LIKE '%" . $filter . "%';";
            $resultado = $conexion->query($sqlfilter);

            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<tr><th class="id">ID</th><th class="nombre">Nombre</th><th class="apellido">Apellido</th><th class="correo">Correo</th><th class="fecha">Fecha de nacimiento</th></tr>';
                echo '</table>';
                while ($row = $resultado->fetch_assoc()) {
                    echo '<table>';
                    echo '<tr><td class="id">'.$row['Id'].'</td><td class="nombre">'.$row['Nombre'].'</td><td class="apellido">'.$row['Apellido'].'</td><td class="correo">'.$row['Correo'].'</td><td class="fecha">'.$row['Fecha_nacimiento'].'</td></tr>';
                    echo '</table>';
                }
            } else {
                echo '<div class="container-error">
                        <img src="../Imagenes/equis.png">
                        <div class="unf">Usuario no encontrado</div>   
                      </div>';
            }
        }

        // Filtrar por ID
        if (isset($_GET['filtro-id'])) {
            $filterid = $_GET['filtro-id'];
            $sqlfilterid = "SELECT Id, Nombre, Apellido, Correo, Fecha_nacimiento 
                            FROM usuarios
                            WHERE Id = '$filterid'";
            $resultado = $conexion->query($sqlfilterid);

            if ($resultado->num_rows > 0) {
                echo '<table>';
                echo '<tr><th class="id">ID</th><th class="nombre">Nombre</th><th class="apellido">Apellido</th><th class="correo">Correo</th><th class="fecha">Fecha de nacimiento</th></tr>';
                echo '</table>';
                while ($row = $resultado->fetch_assoc()) {
                    echo '<table>';
                    echo '<tr><td class="id">'.$row['Id'].'</td><td class="nombre">'.$row['Nombre'].'</td><td class="apellido">'.$row['Apellido'].'</td><td class="correo">'.$row['Correo'].'</td><td class="fecha">'.$row['Fecha_nacimiento'].'</td></tr>';
                    echo '</table>';
                }
            }else {
                echo '<div class="container-error">
                        <img src="../Imagenes/equis.png">
                        <div class="unf">Usuario no encontrado</div>   
                      </div>';
            }
        }
        ?>

    </div>

    <form action="Admin.php">
        <input type="submit" value="Regresar" class="boton-regresar">
    </form>

</body>
</html>
