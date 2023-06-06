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

        <form method="post" action="<?=site_url('/guardarsede'); ?>" enctype="multipart/form-data">
    <br>
      <div class="form-group">
        <label for="sede">Nombre de la sede:</label>
        <input id="sede" value="<?=old('sede')?>" class="form-control" type="text" name="sede" placeholder="Nombre de la sede.">
      </div>
      <br>
      <div class="form-group">
        <label for="id">Abreviatura de la sede:</label>
        <input id="id" value="<?=old('id')?>" class="form-control" type="text" name="id" placeholder="Abreviatura de la sede.">
      </div>
    

      <button class="btn btn-success" type="submit">Guardar</button>
      </form>
      </p>
      </div>
    </div>

    <br>
  </center>









</body>
</html>