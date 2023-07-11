<!DOCTYPE html>
<html lang="en">

 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.7.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Tabla de asistencias</title>
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/dropdown/css/style.css">
  <link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="<?=base_url('/public/img/assets');?>/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="<?=base_url('/public/img/assets');?>/mobirise/css/mbr-additional.css" type="text/css">

</head>


</head>
<body>
<section data-bs-version="5.1" class="menu cid-tHSxImlL10" once="menu" id="menu1-3">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                        <img src="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" alt="" style="height: 4.4rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-5" href="index.html#top">BUAP</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-primary display-4"  data-toggle="modal" data-target="#modalParaEditar"> <span class="mbrib-contact-form mbr-iconfont mbr-iconfont-btn"></span>Registrar Trabajadores</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" href="<?= base_url('tusuarios');?>" aria-expanded="false"><span class="mobi-mbri mobi-mbri-users mbr-iconfont mbr-iconfont-btn"></span>Usuarios Registrados</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" data-toggle="modal" data-target="#modalParaAsistencias"><span class="mobi-mbri mobi-mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>Tomar Asistencia</a></li><li class="nav-item"><a class="nav-link link text-primary display-4" href="<?= base_url('tasistencia');?>" aria-expanded="false"><span class="mobi-mbri mobi-mbri-bulleted-list mbr-iconfont mbr-iconfont-btn"></span>Tabla de Asistencias</a></li></ul>

                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-success display-4" href="index.html"><span class="mobi-mbri mobi-mbri-logout mbr-iconfont mbr-iconfont-btn"></span>Cerrar Sesión</a></div>
            </div>
        </div>
    </nav>

</section>



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
            <a href="<?=base_url('tusuarios')?>" class="btn btn-danger" type="button">cancelar</a>
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
