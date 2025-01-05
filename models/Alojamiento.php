<?php

    class Alojamiento{
        public $id;
        public $nombre;
        public $descripcion;
        public $ubicacion;
        public $precio;
        public $creado_en;
        public $connection;
        public $table_name = "alojamientos";

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
            $query = "INSERT INTO {$this->table_name} (nombre, descripcion, ubicacion, precio) 
                      VALUES (:nombre, :descripcion, :ubicacion, :precio)";
            $sentence = $this->connection->prepare($query);
        
            // Bind de los parámetros
            $sentence->bindParam(':nombre', $this->nombre);
            $sentence->bindParam(':descripcion', $this->descripcion);
            $sentence->bindParam(':ubicacion', $this->ubicacion);
            $sentence->bindParam(':precio', $this->precio);
        
            if ($sentence->execute()) {
                return true;
            }
            return false;
        }

        public function eliminate($id){
            $this->id = $id;
            $query = "DELETE FROM {$this->table_name} WHERE id = :id";
            $sentence = $this->connection->prepare($query);
            $sentence->bindParam(':id', $this->id);
            $sentence->execute();
            return $sentence;
        }

    }

?>