<?php
require_once './config/database.php';
require_once './models/usuario.php';

class UsuarioController
{
    public $usuario;
    public $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function create()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $correo = str_replace(' ', '', $_POST['correo']);
            $this->usuario->correo = $correo;
            if (!filter_var($this->usuario->correo, FILTER_VALIDATE_EMAIL)) {
                header("Location: formulario.php?error=correo_invalido");
                exit;
            }

            header("Location: formulario.php");
            $contrasena = $_POST['contrasena'];
            if (strlen($contrasena) < 9) {
                header("Location: formulario.php?error=contrasena_invalida");
                exit;
            }
            if (!preg_match('/[A-Z]/', $contrasena)) {
                header("Location: formulario.php?error=contrasena_invalida_sin_mayus");
                exit;
            }
            $this->usuario->contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
            $this->usuario->rol = $_POST['rol'];
            $this->usuario->create();
        }
    }
}
