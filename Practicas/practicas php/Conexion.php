<?php

$dsn = 'mysql:host=localhost;dbname=brian';
$usuario = 'root';
$contraseña = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];

    $conexion = new PDO($dsn,$usuario,$contraseña,$options);
?>