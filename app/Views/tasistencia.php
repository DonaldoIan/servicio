<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de asistencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="<?= base_url('menu');?>" class="navbar-brand" type="button">Menu</a>
      <a class="navbar-brand" href="#" onclick="ocultarFormulario()">Tabla de asistencias</a>
      
    </div>
  </nav><br>



<div class="container">
    <table class="table table-light">
      <thead class="thead-light">
        <tr>
            <th>Trabajador</th>
            <th>Sede de trabajador</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Huella</th>
        </tr>
        </thead>
    <tbody>
       
        <?php if (!empty($asistencias)): ?>
    <?php foreach ($asistencias as $lib): ?>

      <tr>
    
            <td><?= $lib['id_trabajador']; ?></td>
            <td><?= $lib['id_sede']; ?></td>
            <td><?= $lib['fecha']; ?></td>
            <td><?= $lib['hora']; ?></td>
            <td><?= $lib['id_huella']; ?></td>
            


            </tr>
            <?php endforeach; ?>
<?php endif; ?>
        
        
    </tbody>
    </table>
  </div>
    







</body>
</html>