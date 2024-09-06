<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources\CSS\Style.css">
</head>
<body>
    
<form action="main.php" method="post" id="formulario">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre..." required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" placeholder="Apellido..." required>
    
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
    
    <label for="dni">DNI:</label>
    <input type="number" name="dni" id="dni" placeholder="DNI..." required>
    
    <label for="localidad">Localidad:</label>
    <input type="text" name="localidad" id="localidad" placeholder="Localidad..." required>
    
    <label for="provincia">Provincia:</label>
    <input type="text" name="provincia" id="provincia" placeholder="Provincia..." required>
    
    <label for="telefono">Teléfono:</label>
    <input type="number" name="telefono" id="telefono" placeholder="Teléfono..." required>
    
    <label for="mail">E-Mail:</label>
    <input type="text" name="mail" id="mail" placeholder="E-Mail..." required>
    
    <label for="sueldo">Sueldo:</label>
    <input type="number" name="sueldo" id="sueldo" placeholder="Sueldo..." required>

    <div id="empleado-cliente">

    </div>
    
    <div class="checkbox-container">
        <label for="check_empleado">Empleado:</label>
        <input type="checkbox" name="empleado" id="check_empleado" onclick="verificarTipo()">

        <label for="check_cliente">Cliente:</label>
        <input type="checkbox" name="cliente" id="check_cliente" onclick="verificarTipo()">
    </div>


    <input type="button" value="Subir" onclick="verficarFormulario()">
</form>


</body>

<script src="Resources\JS\Fn.js"></script>
</html>