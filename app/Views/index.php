<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>

    <link rel="stylesheet" href="<?=base_url('/public/img/css/loginusuario.css');?>" />

</head>
<body>

    <h1 class="bienvenida">¡BIENVENIDO!</h1>
    <br></br>
    <br></br>
    
<div class="container" id="container">
	<div class="form-container sign-in-container">


		<form action="<?= base_url('menu');?>" method="post">

			<h1>INICIAR SESIÓN</h1><br>
			<span>ESCRIBE TU CORREO Y CONTRASEÑA</span>
      <span> PARA ACCEDER AL SISTEMA</span>
			<br>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password_user" placeholder="Contraseña" />
			<br>
			<a href="<?= base_url('menu');?>" class="nav-link btn btn-primary" type="button">Ingresar</a>

		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
        <img src="<?=base_url('/public/img/escudologin.png');?>" width="300" height="300">
        
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?=base_url('/public/img/js/loginusuario.js');?>" ></script>

</body>
</html>