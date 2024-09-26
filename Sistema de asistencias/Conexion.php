<?php

$dsn = 'mysql:host=localhost;dbname=escueladb';
$usuario = 'root';
$contraseña = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];

try {
    $conexion = new PDO($dsn, $usuario, $contraseña, $options);
    // Si llegamos aquí, la conexión fue exitosa
    //echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Si ocurre una excepción, la conexión falló
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>  