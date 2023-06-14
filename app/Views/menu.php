<!DOCTYPE html>
<html>
<head>
  <title>Menú</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar {
      justify-content: flex-start;
    }

    .navbar-nav {
      margin-left: auto;
    }
    .container {
    display: flex;
    justify-content: flex-start;
  }
  
  .right-align {
    margin-left: auto;
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Menú</a>
      <a class="nav-link" href="<?=base_url();?>usuario"> Registrar Trabajadores</a>
    </div>
  </nav>

  

  <!-- Contenido de la página -->
<br>
<center><h3>Uruarios Registrados:</h3></center>
  

  <?php if ($trabajadores && $asistencias): ?>
  <?php foreach ($trabajadores as $index => $lib): ?>



    <section class="container right-align">
  <div class="card" style="width: 30%;">
    <div class="card-body">
      <h5 class="card-title">Trabajador: <?= $lib['nombres']; ?></h5>
      <p class="card-text">
        <p>Puesto: <?= $lib['puesto']; ?></p>
        <p>Id del trabajador: <?= $lib['id_trabajador']; ?></p>
        <p>Nombre completo: <?= $lib['nombres']; ?> <?= $lib['apellido_pat']; ?> <?= $lib['apellido_mat']; ?></p>
        <p>Huella: Registrada</p>
        <p></p>
      </div>
    </div>
    <div class="card" style="width: 30%;">
      <div class="card-footer">
      <h5 class="card-title">Horario</h5>
        <p>Fecha: <?= $asistencias[$index]['fecha']; ?></p>
        <p>Hora inicio: <?= $asistencias[$index]['hora_entrada']; ?></p>
        <p>Hora fin: <?= $asistencias[$index]['hora_salida']; ?></p>
      </div>
    </div>
    <div class="card" style="width: 30%;">
      <div class="card-footer">
      <h5 class="card-title">Acciones</h5>
        <center>
          <a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a>
          <a name="" id="" class="btn btn-primary" href="#" role="button">Borrar</a>
        </center>
      </div>
    </div>
</section>


  
    <br>
  <?php endforeach; ?>
<?php endif; ?>









  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>