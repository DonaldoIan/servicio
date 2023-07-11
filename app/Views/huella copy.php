<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
<style>
  .center-image {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10%; /* Ajusta la altura según tus necesidades */
  }

  .center-image img {
    max-width: 50%; /* Ajusta el tamaño de la imagen según tus necesidades */
    max-height: 50%; /* Ajusta el tamaño de la imagen según tus necesidades */
  }
</style>
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
    







    
<br>

    <div class="card" class="box" style="width:30%" >
      <div class="card-body">
        <h5 class="card-title">Registro del trabajador:</h5>
        <p class="card-text">

        <form method="post" action="<?= site_url('asistencia/' . $usuario['id']) ?>" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$usuario['id']?>">
    <br>
      <div class="form-group">
        <label for="huella">ingresa las huellas digitales:</label>
        <input id="huella" value="<?=old('huella')?>" class="form-control" type="text" name="huella" placeholder="Ingresa las huellas digitales.">
      </div>
    <br>
    <div class="center-image">
  <img src="<?=base_url('/public/img/huella.png');?>" alt="">
</div>
<br><br>
      
      <button class="btn btn-success" type="submit">Guardar</button>
      </form>
      </p>
      </div>
    </div>

    <br>
  </center>








</body>
</html>