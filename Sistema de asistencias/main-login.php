
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
    
    require_once 'Conexion.php';
    require_once 'Clases/Profesor.php';

    if(isset($_POST["login-name"]) &&!empty($_POST["login-name"]) && isset($_POST["login-pass"]) && !empty($_POST["login-pass"])){
        $mail = $_POST["login-name"];
        $contraseña = $_POST["login-pass"];

        $mail = htmlspecialchars($mail); 
        $contraseña = htmlspecialchars($contraseña);
        $mail = trim($mail); 
        $contraseña = trim($contraseña);

        $sql_login =
        "SELECT *
        FROM usuario
        WHERE mail = :mail";

        $resultado = $conexion->prepare($sql_login);
        $resultado->bindParam(':mail', $mail);
        $resultado->execute();
        
        $row = $resultado->fetch(PDO::FETCH_ASSOC);



        if ($row) {
            if (password_verify($contraseña, $row['passw'])) {
                session_start();
                ob_clean();
                if ($row['rol'] == "administrador") {
                    $_SESSION['row'] = $row;
                    echo json_encode(['mensaje' => 'verdadero', 'url' => '/Administradores/Administrador-index.php']); //mando como url el url al que voy a redireccionar en js
                    exit();
        
                } elseif ($row['rol'] == "profesor") {
                    $_SESSION['rowuser'] = $row;
                    $id_profesor = $row['id_profesor'];
                    $row_profesor = Profesor::getProfesor($conexion, $id_profesor);
                    $_SESSION['rowprofesor'] = $row_profesor;
        
                    if ($contraseña === $row_profesor['dni']) {
                        echo json_encode(['mensaje' => 'verdadero', 'url' => 'Cambio-contraseña.php']);
                    } else {
                        echo json_encode(['mensaje' => 'verdadero', 'url' => 'Profesores/profesores-index.php']);
                    }
                    exit();
                }
        
            } else {
                ob_clean();
                echo json_encode(['mensaje' => 'falso']);
                exit;
            }
        } else {
            ob_clean();
            echo json_encode(['mensaje' => 'mail-invalido']);
            exit;
        }
        
    }

?>
