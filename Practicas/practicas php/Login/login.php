<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/CSS/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <h3 class="titulo-principal">Bienvenido</h3>

    <div class="div-principal">
        <form action="main-login.php" method="post">
            <input type="text" name="email" id="email" required placeholder="Ingresa tu E-MAIL">
            <input type="password" name="pass" id="pass" required placeholder="Contraseña">
            <input type="submit" value="Ingresar">
        </form>

        <div class="registrar">
        No tiene una cuenta?<a href="../index.php"> Registrate.</a>
        </div>
    </div>
</body>
</html>
