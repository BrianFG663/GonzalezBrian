<?php
    
    require_once 'C:\GonzalezBrian\Practicas\practicas php\Conexion.php';

    if(isset($_POST["email"]) && isset($_POST["pass"])){
        $usuario = $_POST["email"];
        $contraseña = $_POST["pass"];

        $sqluser = 
        "select *
        from personas
        where mail = '$usuario'";

        $result=$conexion->query($sqluser);

        if ($result -> num_rows == 0){
            
            echo "usuario no existe";

        }
    }

?>