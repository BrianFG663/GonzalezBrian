<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>

    <div class="titles">
        <h2>bienvenido</h2>
        <div class="Titletarea">Que tarea desea realizar?</div>
    </div>

    <div class="botones">
        <form action="Admin-show-BD.php">
            <input type="submit" value="Ver base de datos completa">
        </form>

        <form action="Admin-registrar-empleado.php">
            <input type="submit" value="Registrar empleado">
        </form>

        <form action="">
                <input type="submit" value="Eliminar empleado">
        </form>

        <form action="">
                <input type="submit" value="Dar/quitar administrador a un empleado">
        </form>
   </div>
</body>
</html>