<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <form action="Ingreso.php" method="post" id="FormularioIngreso">
        <label for="usuario">Correo</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Ingrese su usuario..."> <br>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña" required placeholder="Ingrese su contraseña..."> <br>
        <div id="checkbox-tyc">
            <label for="TyC">Terminos y condiciones</label>
            <input type="checkbox" id="TyC">
        </div>
        <input type="button" onclick="verificaciones()" value="Ingresar">
    </form>
</body>



<script src="JS/FN.js"></script>
</html>

