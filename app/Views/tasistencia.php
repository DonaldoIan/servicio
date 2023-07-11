<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.7.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?=base_url('/public/img/assets');?>/images/imagen5-1.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Tabla de Asistencias</title>
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
        <br>
        <div class="card" style="width: 95%;">
            <div class="card-body">
                <h5 class="card-title">Tabla de Asistencias:</h5>
                <p class="card-text">
                    <div class="form-group">
                        <label for="buscar">Buscador</label>
                        <input id="buscar" class="form-control" type="text" name="buscar" placeholder="Buscar trabajador" style="width: 50%;">
                    </div>
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
                        <tbody id="tablaAsistencias">
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
                </p>
            </div>
        </div>
    </center>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Filtrar la tabla al ingresar texto en el buscador
            $('#buscar').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#tablaAsistencias tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            <?php if(session('mensaje')){ ?>
                $('#mensajeModal').modal('show');
            <?php } ?>
        });
    </script>

</body>

</html>
