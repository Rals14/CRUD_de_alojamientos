<?php
require_once './config/database.php';
require_once './models/Alojamiento.php';

class AlojamientoController {
    public $alojamiento;
    public $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->alojamiento = new Alojamiento($this->db); 
    }

    public function read() {
        $sentence = $this->alojamiento->read(); 
        return $sentence->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function eliminate($id){
        return $this->alojamiento->eliminate($id);
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->alojamiento->nombre = $_POST['nombre'];
            $this->alojamiento->descripcion = $_POST['descripcion'];
            $this->alojamiento->ubicacion = $_POST['ubicacion'];
            $this->alojamiento->precio = $_POST['precio'];

            $this->alojamiento->create();
        }
    }
}
