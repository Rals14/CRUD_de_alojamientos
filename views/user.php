<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vista de usuario</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="row g-4">
    
      <?php
      
      require_once './controller/AlojamientoController.php';
      require_once './controller/UsuarioController.php';
      $alojamientoController = new AlojamientoController();
      $alojamientos=$alojamientoController->read();
      $usuarioController = new UsuarioController();
      $usuarioActual = $usuarioController->buscarPorId($_SESSION['usuario_id']);

      if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST['action'] == "agregar"){
          $usuarioActual->agregarAlojamiento($_POST['id']);
        }else if($_POST['action'] == "eliminar"){
          $usuarioActual->eliminarAlojamiento($_POST['id']);
        }
      }
      

    
      foreach($alojamientos as $alojamiento):
      ?>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title fw-bold text-dark"><?php echo $alojamiento->nombre ?></h5>
            <p class="card-text text-muted"><?php echo $alojamiento->descripcion ?></p>
            <p class="text-secondary small">Ubicación: <?php echo $alojamiento->ubicacion ?></p>
            <p class="text-success fs-5 fw-bold">Precio: $<?php echo $alojamiento->precio ?></p>
            <?php if($alojamiento->tieneRelacion($_SESSION['usuario_id'], $alojamiento->id)): ?>
                <form method="POST" action="index.php?page=usuario">
                    <input type="hidden" name="action" value="eliminar">
                    <input type="hidden" name="id" value="<?php echo $alojamiento->id; ?>">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            <?php else: ?>
                <form method="POST" action="index.php?page=usuario">
                    <input type="hidden" name="action" value="agregar">
                    <input type="hidden" name="id" value="<?php echo $alojamiento->id; ?>">
                    <button type="submit" class="btn btn-warning">Agregar</button>
                </form>
            <?php endif; ?>
          </div>
          
        </div>
      </div>     
       <?php endforeach?>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
