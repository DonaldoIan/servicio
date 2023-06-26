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

<center>
    <br>
  <?php if(session('sms')){?>
    <div class="alert alert-danger" role="alert">
      <?php
        echo session('sms');
      ?>
    </div>
  <?php
    }
    ?>



    <style>
      .box {width:90%;}
    </style>

    <br>

    <div class="card" class="box" style="width:23%" >
      <div class="card-body">
        <h5 class="card-title">Editar Trabajador:</h5>
        <p class="card-text">
            
            <form method="post" action="<?= site_url('/actualizar'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$usuarios['id']?>"> 
            <div class="form-group">
              <label for="nombre">Nombre(s):</label>
              <input id="nombre" value="<?=$usuarios['nombre']?>" class="form-control" type="text" name="nombre" placeholder="Nombre(s).">
            </div>
            <div class="form-group">
              <label for="paterno">Apellido Paterno:</label>
              <input id="paterno" value="<?=$usuarios['apellido_pat']?>" class="form-control" type="text" name="paterno" placeholder="Apellido Paterno.">
            </div>
            <div class="form-group">
              <label for="materno">Apellido Materno:</label>
              <input id="materno" value="<?=$usuarios['apellido_mat']?>" class="form-control" type="text" name="materno" placeholder="Apellido Materno.">
            </div>
            <div class="form-group">
  <label for="tema">Puesto:</label>
  <select id="tema" class="form-control" name="tema">
    <option <?php echo ($usuarios['puesto'] == 'Docente') ? 'selected' : ''; ?>>Docente</option>
    <option <?php echo ($usuarios['puesto'] == 'Técnico Académico') ? 'selected' : ''; ?>>Técnico Académico</option>
    <option <?php echo ($usuarios['puesto'] == 'Administrativo') ? 'selected' : ''; ?>>Administrativo</option>
    <option <?php echo ($usuarios['puesto'] == 'Intendencia') ? 'selected' : ''; ?>>Intendencia</option>
    <option <?php echo ($usuarios['puesto'] == 'Mantenimiento') ? 'selected' : ''; ?>>Mantenimiento</option>
  </select>
</div>

<div class="form-group">
  <label for="sede">Sede:</label>
  <select id="sede" class="form-control" name="sede">
    <option <?php echo ($sedeModel['sede'] == 'San José Chiapa') ? 'selected' : ''; ?>>San José Chiapa</option>
    <option <?php echo ($sedeModel['sede'] == 'Ciudad Serdán') ? 'selected' : ''; ?>>Ciudad Serdán</option>
    <option <?php echo ($sedeModel['sede'] == 'El Seco') ? 'selected' : ''; ?>>El Seco</option>
    <option <?php echo ($sedeModel['sede'] == 'Tepeaca') ? 'selected' : ''; ?>>Tepeaca</option>
    <option <?php echo ($sedeModel['sede'] == 'Acajete') ? 'selected' : ''; ?>>Acajete</option>
  </select>
</div>

            <div class="modal-footer">
            <a href="<?=base_url('tusuarios')?>" class="btn btn-info" type="button">cancelar</a>
              <button class="btn btn-info" type="submit" onclick="ocultarFormulario()">Guardar</button>
            </div>
          </form>
      </p>
      </div>
    </div>

    </center>







<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
