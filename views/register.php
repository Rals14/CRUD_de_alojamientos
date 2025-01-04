<?php
require_once './controller/UsuarioController.php';
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $controller = new UsuarioController();
    $controller->create();
}
if (isset($_GET['error']) && $_GET['error'] === 'correo_invalido') {
    echo "<h1 style='color:red;'>El correo electrónico no tiene un formato válido.</h1>";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Registro de Usuario</h3>
                        
                        <form method="POST">
        
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email" name="correo" placeholder="usuario@ejemplo.com" required>
                            </div>
         
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="contrasena" placeholder="Tu contraseña" required>
                            </div>
               
                            <div class="mb-3">
                                <label for="accountType" class="form-label">Tipo de Cuenta</label>
                                <select class="form-select" id="accountType" name="rol" required>
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <option value="alojamientosnombreadministrador">Administrador</option>
                                    <option value="usuario">Usuario</option>
                                </select>
                            </div>
                        
                            <button class="btn btn-success w-100" type="submit">Crear </a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
