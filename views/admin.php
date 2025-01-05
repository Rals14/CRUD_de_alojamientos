<?php
require_once './controller/AlojamientoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AlojamientoController();
    $controller->create();
    echo "<div class='alert alert-success text-center'>Alojamiento agregado correctamente.</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h1 class="mb-4 text-center">Agregar Alojamiento</h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del alojamiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Describa el alojamiento" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ingrese la ubicación" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Agregar Alojamiento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
