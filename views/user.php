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
      $controler = new AlojamientoController();
      $alojamientos=$controler->read();
      
      if (isset($_GET['id'])) {
        $id = intval($_GET['id']); 
        if ($controler->eliminate($id)) {
            echo "<div class='alert alert-success'>Alojamiento eliminado correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al eliminar el alojamiento.</div>";
        }
    }
    
      foreach($alojamientos as $alojamiento):
      ?>
      <div class="col-sm-6 col-md-4">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title fw-bold text-dark"><?php echo $alojamiento['nombre'] ?></h5>
            <p class="card-text text-muted"><?php echo $alojamiento['descripcion'] ?></p>
            <p class="text-secondary small">Ubicación: <?php echo $alojamiento['ubicacion'] ?></p>
            <p class="text-success fs-5 fw-bold">Precio: $<?php echo $alojamiento['precio'] ?></p>
            <a href="index.php?id=<?php echo $alojamiento['id']; ?>" class="btn btn-warning">Eliminar</a>
          </div>
          
        </div>
      </div>     
       <?php endforeach?>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
