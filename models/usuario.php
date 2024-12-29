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
            return $sentence->fetch(PDO::FETCH_ASSOC);
        }

    }

?>