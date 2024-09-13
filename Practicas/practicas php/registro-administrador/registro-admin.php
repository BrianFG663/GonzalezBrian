<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/CSS/Style.css">
</head>
<body>

<form action="main-registro.php" method="post" id="formulario">
    <h2>Registrar Administrador</h2>
    
    <div class="form-group-container">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre..." required>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido..." required>
        </div>
    </div>
    
    <div class="form-group-container">
        <div class="form-group">
            <label for="mail">E-Mail:</label>
            <input type="text" name="mail" id="mail" placeholder="E-Mail..." required>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña..." required>
        </div>
    </div>
    
    <input type="button" value="Registrar" onclick="verificarAdmin()">
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../Resources/JS/Fn.js"></script>
</html>
