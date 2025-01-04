<?php

    class usuario{
        public $id;
        public $correo;
        public $contrasena;
        public $rol;
        public $connection;
        public $table_name = "usuarios";
    

        public function __construct($db){
            $this->connection = $db;
        }

        public function read(){
            $query = "SELECT * FROM {$this->table_name}";
            $sentence = $this->connection->prepare($query);
            $sentence->execute();
            
            return $sentence;
        }

        public function create() {
            $query = "INSERT INTO {$this->table_name} (correo, contrasena, rol) 
                      VALUES (:correo, :contrasena, :rol)";
            $sentence = $this->connection->prepare($query);
        
            // Bind de los parámetros
            $sentence->bindParam(':correo', $this->correo);
            $sentence->bindParam(':contrasena', $this->contrasena);
            $sentence->bindParam(':rol', $this->rol);

            if ($sentence->execute()) {
                return true;
            }
            return false;
        }

        public function buscarPorCorreo($correo) {
            $query = "SELECT * FROM usuarios WHERE correo = :correo";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':correo', $correo);
            $sentence->execute();
            $row = $sentence->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $this->id = $row['id'];
                $this->correo = $row['correo'];
                $this->contrasena = $row['contrasena'];
                $this->rol = $row['rol'];
                return $this;
            } else {
                return null;
            }
        }

        public function seleccionarAlojamiento($alojamiento_id) {
        $query = "INSERT INTO usuarios_alojamientos (usuario_id, alojamiento_id) VALUES (:usuario_id, :alojamiento_id)";
        $sentence = $this->connection->prepare($query);
        $sentence->bindParam(':usuario_id', $this->id);
        $sentence->bindParam(':alojamiento_id', $alojamiento_id);
        return $sentence->execute();
        }

    }

?>