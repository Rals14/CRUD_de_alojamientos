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

        public function buscarPorId($id) {
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':id', $id);
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

        public function agregarAlojamiento($alojamiento_id) {
            if ($this->verificarRelacionExistente($this->id, $alojamiento_id)) {
                echo "La relación ya existe.\n";
                return false;
            }

            $query = "INSERT INTO usuarios_alojamientos (usuario_id, alojamiento_id) VALUES (:usuario_id, :alojamiento_id)";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':usuario_id', $this->id);
            $sentence->bindParam(':alojamiento_id', $alojamiento_id);
            return $sentence->execute();
        }

        private function verificarRelacionExistente($usuario_id, $alojamiento_id)
        {
            $query = "SELECT COUNT(*) FROM usuarios_alojamientos WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':usuario_id', $usuario_id);
            $sentence->bindParam(':alojamiento_id', $alojamiento_id);
            $sentence->execute();

            $count = $sentence->fetchColumn();
            return $count > 0;
        }

        public function eliminarAlojamiento($alojamiento_id) {

            if (!$this->verificarRelacionExistente($this->id, $alojamiento_id)) {
                echo "La relación no existe.\n";
                return false;
            }
            
            $query = "DELETE FROM usuarios_alojamientos WHERE usuario_id = :usuario_id AND alojamiento_id = :alojamiento_id";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':usuario_id', $this->id);
            $sentence->bindParam(':alojamiento_id', $alojamiento_id);
            return $sentence->execute();
        }

    }

?>