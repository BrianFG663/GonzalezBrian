<?php

class Alumno {
    private $conn;
    private $table = 'alumnos';

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo_electronico;
    public $fecha_nacimiento;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un nuevo alumno
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre, apellido,correo_electronico,telefono,fecha_nacimiento)
         VALUES (:nombre, :apellido,:correo_electronico, :telefono,:fecha_nacimiento)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':correo_electronico', $this->correo_electronico);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Otros métodos (read, update, delete) se podrían implementar aquí
}

