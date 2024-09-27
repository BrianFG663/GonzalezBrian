
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



        if(!$row){ //en caso de no encontrar un usuario con ese mail, salta alerta y redirecciona otra vez al login.
            echo '<script>
            Swal.fire({
                icon: "error",
                text: "Prueba con otro!",
                title: "Correo electronico no registrado"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        </script>';
        }
        else{
            if(password_verify($contraseña, $row['passw'])){ //en caso de encontrar un usuario con ese mail verifica la contraseña y busca su rol en la base de datos.
                if($row['rol'] == "administrador"){
                    session_start();
                    $_SESSION['row'] = $row;
                    header('location: /Administradores/Administrador-index.php'); //dependiendo de su rol lo redirecciona a una archivo u otro
                    exit();

                }

                if($row['rol'] == "profesor"){
                    session_start();
                    $_SESSION['rowuser'] = $row;
                    $id_profesor = $row['id_profesor'];

                    $sql_id = 
                    "SELECT *
                    FROM profesor
                    WHERE id = :id";

                    $resultado = $conexion->prepare($sql_id);
                    $resultado->bindParam(':id', $id_profesor);
                    $resultado->execute();
                    $row_profesor = $resultado->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['rowprofesor'] = $row_profesor;
                    header('location: Profesores/profesores-index.php'); //dependiendo de su rol lo redirecciona a una archivo u otro
                    exit();
                }
            }else{ //en caso de encontrar un usuario con ese mail pero la contraseña es incorrecta, salta alerta y redirecciona otra vez al login.
                echo '<script> 
                    Swal.fire({
                    icon: "error",
                    text: "Prueba otra vez!",
                    title: "Contraseña incorrecta"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php";
                    }
                    });
                    </script>';
            }
        }
    }

?>
