<?php
    include_once(__DIR__ . '/../Resources/Traits/Funciones.php');


    class Usuario{
        use Funciones;

        public $nombre;
        public $apellido;
        protected $mail;
        protected $pass;
        protected $rol;

        public function __construct($nombre,$apellido,$mail,$pass,$rol){
            $this->nombre = $this->uperCase($nombre);
            $this->apellido = $this->uperCase($apellido);
            $this->mail = $mail;
            $this->pass = $pass;
            $this->rol = $rol;
        }

        public function buscarUsuario($conexion,$id){

            $sql_buscar =
            "SELECT *
            FROM usuario
            WHERE id = :id";

            $resultado = $conexion->prepare($sql_buscar);
            $resultado->bindParam(':id', $id);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        public function comprobarMail($conexion,$mail){
            $sql_mail = 
            "SELECT mail
            FROM usuario
            WHERE mail = :mail";

            $resultado = $conexion->prepare($sql_mail);
            $resultado->bindParam(':mail', $mail);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);

            if($row){
                return false;
            }else{
                return true;
            }

        }

        public function comprobarContraseña($contraseña_actual){

            if(password_verify($contraseña_actual, $this->pass)){
                return true;
            }else{
                return false;
            }
        }

        public function insertUsuario($conexion,$dni){
            $contraseña = password_hash($this->pass, PASSWORD_DEFAULT);
            $sql_dni = 
            "SELECT id
            FROM profesor
            WHERE dni = :dni";

            $resultado = $conexion->prepare($sql_dni);
            $resultado->bindParam(':dni', $dni);
            $resultado->execute();

            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            if($row){
                $profesor_id = (int)$row['id'];
            }


            $sql_insert =
            "INSERT INTO  usuario(nombre,apellido,mail,passw,rol,id_profesor)
            VALUE (:nombre,:apellido,:mail,:passw,:rol,:id_profesor)";

            $resultado = $conexion->prepare($sql_insert);

            $resultado->bindParam(':nombre', $this->apellido);
            $resultado->bindParam(':apellido', $this->nombre);
            $resultado->bindParam(':mail', $this->mail);
            $resultado->bindParam(':passw', $contraseña);
            $resultado->bindParam(':rol', $this->rol);
            $resultado->bindParam(':id_profesor', $profesor_id);
            $resultado->execute();
        }

        public function eliminarUsuario($conexion,$id){
            
            $sql_eliminar = 
            "DELETE FROM usuario 
            WHERE id = :id";
            $resultado_eliminar = $conexion->prepare($sql_eliminar);
            $resultado_eliminar->bindParam(':id', $id);
            $resultado_eliminar->execute();
        }

        public function cambiarNombre($conexion,$id,$nombre){
            $sql_cambiar_nombre = 
            "UPDATE usuario
            SET nombre = :nombre 
            WHERE id = :id";

            $resultado_cambio = $conexion->prepare($sql_cambiar_nombre);
            $resultado_cambio->bindParam(':id', $id);
            $resultado_cambio->bindParam(':nombre', $this->uperCase($nombre));
            $resultado_cambio->execute();
        }

        public function cambiarApellido($conexion,$id,$apellido){
            $sql_cambiar_apellido = 
            "UPDATE usuario
            SET apellido = :apellido
            WHERE id = :id";

            $resultado_cambio = $conexion->prepare($sql_cambiar_apellido);
            $resultado_cambio->bindParam(':id', $id);
            $resultado_cambio->bindParam(':apellido', $this->uperCase($apellido));
            $resultado_cambio->execute();
        }

        public function cambiarMail($conexion,$id,$mail){
            $sql_cambiar_mail = 
            "UPDATE usuario
            SET mail = :mail
            WHERE id = :id";

            $resultado_cambio = $conexion->prepare($sql_cambiar_mail);
            $resultado_cambio->bindParam(':id', $id);
            $resultado_cambio->bindParam(':mail', $mail);
            $resultado_cambio->execute();
        }

        public function cambiarContraseña($conexion,$id,$contraseña_nueva){

            $contraseña_nueva = password_hash($contraseña_nueva, PASSWORD_BCRYPT);

            $sql_cambiar_pass = 
            "UPDATE usuario
            SET passw = :pass
            WHERE id = :id";

            $resultado_cambio = $conexion->prepare($sql_cambiar_pass);
            $resultado_cambio->bindParam(':id', $id);
            $resultado_cambio->bindParam(':pass', $contraseña_nueva);
            $resultado_cambio->execute();

        }

    }


?>