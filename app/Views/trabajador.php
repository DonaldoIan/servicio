<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    





<center>
  
    

<br> 
<!--alerta para que todos los campos esten llenos-->
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

    <div class="card" class="box" style="width:30%" >
      <div class="card-body">
        <h5 class="card-title">Registro del trabajador:</h5>
        <p class="card-text">

        <form method="post" action="<?=site_url('/guardar'); ?>" enctype="multipart/form-data">
    <br>
      <div class="form-group">
        <label for="nombre">Nombre(s):</label>
        <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre" placeholder="Nombre(s).">
      </div>
    <br>
      <div class="form-group">
        <label for="paterno">Apellido Paterno:</label>
        <input id="paterno" value="<?=old('paterno')?>" class="form-control" type="text" name="paterno" placeholder="Apellido Paterno.">
      </div>
    <br> 
    <br>
      <div class="form-group">
        <label for="materno">Apellido Materno:</label>
        <input id="materno" value="<?=old('materno')?>" class="form-control" type="text" name="materno" placeholder="Apellido Materno.">
      </div>
    <br> 
    <div class="form-group">
        <label for="puesto">Puesto:</label>
        <input id="puesto" value="<?=old('puesto')?>" class="form-control" type="text" name="puesto" placeholder="Puesto.">
      </div>
    <br> 
      <button class="btn btn-success" type="submit">Guardar</button>
      <a href="<?=base_url('menu');?>" class="btn btn-info">Cancelar</a>
      </form>
      </p>
      </div>
    </div>

    <br>
  </center>









</body>
</html>