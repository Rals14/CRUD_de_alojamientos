<?php
require_once './config/database.php';
require_once './models/usuario.php';

class AuthController{
    public $usuario;
    public $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $correo = str_replace(' ', '',$_POST['correo']);
            $contrasena = $_POST['contrasena'];

            $usuarioData = $this->usuario->buscarPorCorreo($correo);

            if(!$usuarioData){
                header("Location: login.php?error=inicio_session");
                exit;
            }
            if(password_verify($contrasena,$usuarioData['contrasena'])){
                session_start();
                $user = $_SESSION['usuario_id'] = $usuarioData['contrasena'];
                $_SESSION['rol'] = $usuarioData['rol'];
                header("Location: $user.php");
                
                exit;
            }else {
                header("Location: login.php?error=inicio_sesion");
                exit;
            }
        }
    }

    public function logout(){
        session_start();
        $_SESSION=[];
        if(session_id() !==""){
            session_destroy();
        }
        
    }
}
