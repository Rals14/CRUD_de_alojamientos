<?php
session_start();
require_once './controller/AuthController.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new AuthController();
    $controller->login();
}

if(isset($_GET['salir'])){
    $controller = new AuthController();
    $controller->logout();
  
}
?>
<?php


if (empty($_SESSION)) {
    echo "No hay sesión activa.";

}else{
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form action="" method="POST">
                
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="correo" placeholder="ejemplo@correo.com" required>
                </div>
           
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="contrasena" placeholder="••••••••" required>
                </div>
            
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>
    
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <p class="text-center mt-3">
                ¿No tienes una cuenta? <a href="#">Regístrate</a>
                <a href="login.php?salir=si">Cerrar Sesión</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
